<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Imagen;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Helpers\AuditHelper;
use App\Services\HeatmapService;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    /**
     * Mostrar listado de todos los reportes.
     */
    public function index()
    {
        // Si es reportero, solo ve reportes de sus imágenes
        if (auth()->user()->rol->nombre == 'Reportero') {
            $reportes = Reporte::whereHas('imagen', function($query) {
                $query->where('usuario_id', auth()->id());
            })->get();
        } else {
            $reportes = Reporte::all();
        }
        $imagenes = Imagen::where('activo', true)->get();
        $usuarios = Usuario::activos()->get();
        
        // Generar siguiente código
        $ultimoCodigo = Reporte::latest('id')->first();
        $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_reporte, 4)) + 1 : 1;
        $siguienteCodigo = 'REP-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT);
        
        return view('reportes.index', compact('reportes', 'imagenes', 'usuarios', 'siguienteCodigo'));
    }

    /**
     * Formulario de creación de un nuevo reporte.
     */
    public function create()
    {
        $imagenes = Imagen::activas()->get();
        $usuarios = Usuario::activos()->get();
        return view('reportes.create', compact('imagenes', 'usuarios'));
    }

    /**
     * Guardar un nuevo reporte.
     */
    public function store(Request $request)
    {
        // Auto-generar código si no se proporciona
        if (!$request->cod_reporte) {
            $ultimoCodigo = Reporte::latest('id')->first();
            $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_reporte, 4)) + 1 : 1;
            $request->merge(['cod_reporte' => 'REP-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT)]);
        }
        
        $request->validate([
            'cod_reporte' => 'required|unique:reportes,cod_reporte|max:50',
            'imagen_id' => 'required|exists:imagenes,id',
            'usuario_id' => 'nullable|exists:usuarios,id',
            'ruta_pdf' => 'nullable|file|mimes:pdf|max:10240', // max 10MB
            'reporte_json' => 'nullable|json',
        ]);

        $rutaPdf = null;
        if ($request->hasFile('ruta_pdf')) {
            $archivo = $request->file('ruta_pdf');
            $rutaPdf = $archivo->store('reportes', 'public');
        }

        $reporte = Reporte::create([
            'cod_reporte' => $request->cod_reporte,
            'imagen_id' => $request->imagen_id,
            'usuario_id' => $request->usuario_id,
            'ruta_pdf' => $rutaPdf,
            'reporte_json' => $request->reporte_json,
            'activo' => true,
        ]);

        AuditHelper::log('crear', 'reportes', 'Reporte creado: ' . $reporte->cod_reporte);

        return redirect()->route('reportes.index')->with('success', 'Reporte creado correctamente.');
    }

    /**
     * Formulario de edición de un reporte.
     */
    public function edit(Reporte $reporte)
    {
        $imagenes = Imagen::activas()->get();
        $usuarios = Usuario::activos()->get();
        return view('reportes.edit', compact('reporte', 'imagenes', 'usuarios'));
    }

    /**
     * Actualizar un reporte.
     */
    public function update(Request $request, Reporte $reporte)
    {
        $request->validate([
            'cod_reporte' => 'required|max:50|unique:reportes,cod_reporte,' . $reporte->id,
            'imagen_id' => 'required|exists:imagenes,id',
            'usuario_id' => 'nullable|exists:usuarios,id',
            'ruta_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'reporte_json' => 'nullable|json',
        ]);

        $data = $request->only('imagen_id', 'usuario_id', 'reporte_json');

        if ($request->hasFile('ruta_pdf')) {
            $archivo = $request->file('ruta_pdf');
            $data['ruta_pdf'] = $archivo->store('reportes', 'public');
        }

        $reporte->update($data);

        AuditHelper::log('editar', 'reportes', 'Reporte editado: ' . $reporte->cod_reporte);

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado correctamente.');
    }

    public function destroy(Reporte $reporte)
    {
        $codigo = $reporte->cod_reporte;
        $reporte->update(['activo' => false]);
        AuditHelper::log('eliminar', 'reportes', 'Reporte desactivado: ' . $codigo);
        return redirect()->route('reportes.index')->with('success', 'Reporte desactivado correctamente.');
    }

    public function reactivar($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->update(['activo' => true]);
        return redirect()->route('reportes.index')->with('success', 'Reporte reactivado correctamente.');
    }

    public function generarPdf($id)
    {
        $reporte = Reporte::with('imagen.datosExif', 'usuario')->findOrFail($id);
        $heatmapService = new HeatmapService();
        
        $imagenPath = storage_path('app/public/' . $reporte->imagen->ruta_almacenamiento);
        $heatmapPath = storage_path('app/public/heatmaps/heatmap_' . $reporte->id . '.jpg');
        
        if (!file_exists(storage_path('app/public/heatmaps'))) {
            mkdir(storage_path('app/public/heatmaps'), 0755, true);
        }
        
        $heatmapService->generateHeatmap($imagenPath, $heatmapPath);
        
        $datosExif = $reporte->imagen->datosExif->first();
        
        $pdf = Pdf::loadView('reportes.pdf', [
            'reporte' => $reporte,
            'heatmapPath' => $heatmapPath,
            'imagenOriginalPath' => $imagenPath,
            'datosExif' => $datosExif
        ]);
        
        return $pdf->download('reporte_' . $reporte->cod_reporte . '.pdf');
    }
}
