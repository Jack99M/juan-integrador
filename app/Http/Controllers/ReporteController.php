<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Imagen;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Mostrar listado de todos los reportes.
     */
    public function index()
    {
        $reportes = Reporte::all(); // Incluye activos e inactivos
        $imagenes = Imagen::where('activo', true)->get();
        $usuarios = Usuario::activos()->get();
        return view('reportes.index', compact('reportes', 'imagenes', 'usuarios'));
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

        Reporte::create([
            'cod_reporte' => $request->cod_reporte,
            'imagen_id' => $request->imagen_id,
            'usuario_id' => $request->usuario_id,
            'ruta_pdf' => $rutaPdf,
            'reporte_json' => $request->reporte_json,
            'activo' => true,
        ]);

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

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado correctamente.');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->update(['activo' => false]);
        return redirect()->route('reportes.index')->with('success', 'Reporte desactivado correctamente.');
    }

    public function reactivar($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->update(['activo' => true]);
        return redirect()->route('reportes.index')->with('success', 'Reporte reactivado correctamente.');
    }
}
