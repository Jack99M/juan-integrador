<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Analisis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReporteEstadisticoController extends Controller
{
    public function index()
    {
        return view('reportes.estadisticos.index');
    }

    // Reporte de imágenes por estado de análisis
    public function porEstadoAnalisis()
    {
        $estados = Analisis::select('estado', \DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();

        $imagenesPorEstado = Analisis::with('imagen')
            ->get()
            ->groupBy('estado');

        $pdf = Pdf::loadView('reportes.estadisticos.por-estado-analisis', compact('estados', 'imagenesPorEstado'));
        return $pdf->download('reporte_imagenes_por_estado_' . date('Y-m-d') . '.pdf');
    }

    // Reporte de imágenes por formato
    public function porFormato()
    {
        $formatos = Imagen::select('mime', \DB::raw('count(*) as total'))
            ->whereNotNull('mime')
            ->groupBy('mime')
            ->get();

        $imagenesPorFormato = Imagen::whereNotNull('mime')
            ->get()
            ->groupBy('mime');

        $pdf = Pdf::loadView('reportes.estadisticos.por-formato', compact('formatos', 'imagenesPorFormato'));
        return $pdf->download('reporte_imagenes_por_formato_' . date('Y-m-d') . '.pdf');
    }

    // Reporte de imágenes analizadas por estado de subida
    public function porEstadoSubida()
    {
        $estados = Imagen::select('estado', \DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();

        $imagenesPorEstado = Imagen::all()->groupBy('estado');

        $pdf = Pdf::loadView('reportes.estadisticos.por-estado-subida', compact('estados', 'imagenesPorEstado'));
        return $pdf->download('reporte_imagenes_por_estado_subida_' . date('Y-m-d') . '.pdf');
    }

    // Reporte de imágenes del último mes
    public function ultimoMes()
    {
        $fechaInicio = Carbon::now()->subMonth();
        $imagenes = Imagen::where('created_at', '>=', $fechaInicio)
            ->with('analisis')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $imagenes->count(),
            'manipuladas' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'manipulada')->count() > 0;
            })->count(),
            'limpias' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'limpia')->count() > 0;
            })->count(),
        ];

        $pdf = Pdf::loadView('reportes.estadisticos.ultimo-mes', compact('imagenes', 'stats', 'fechaInicio'));
        return $pdf->download('reporte_imagenes_ultimo_mes_' . date('Y-m-d') . '.pdf');
    }

    // Reporte de imágenes del último año
    public function ultimoAnio()
    {
        $fechaInicio = Carbon::now()->subYear();
        $imagenes = Imagen::where('created_at', '>=', $fechaInicio)
            ->with('analisis')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $imagenes->count(),
            'manipuladas' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'manipulada')->count() > 0;
            })->count(),
            'limpias' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'limpia')->count() > 0;
            })->count(),
        ];

        $pdf = Pdf::loadView('reportes.estadisticos.ultimo-anio', compact('imagenes', 'stats', 'fechaInicio'));
        return $pdf->download('reporte_imagenes_ultimo_anio_' . date('Y-m-d') . '.pdf');
    }

    // Reporte por periodo personalizado
    public function porPeriodo(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $fechaInicio = Carbon::parse($request->fecha_inicio);
        $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();

        $imagenes = Imagen::whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->with('analisis')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $imagenes->count(),
            'manipuladas' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'manipulada')->count() > 0;
            })->count(),
            'limpias' => $imagenes->filter(function($img) {
                return $img->analisis->where('resultado', 'limpia')->count() > 0;
            })->count(),
        ];

        $pdf = Pdf::loadView('reportes.estadisticos.por-periodo', compact('imagenes', 'stats', 'fechaInicio', 'fechaFin'));
        return $pdf->download('reporte_imagenes_' . $fechaInicio->format('Y-m-d') . '_a_' . $fechaFin->format('Y-m-d') . '.pdf');
    }

    // Reporte general de todas las imágenes con porcentajes
    public function general()
    {
        $totalImagenes = Imagen::count();
        $totalUsuarios = \App\Models\Usuario::where('activo', true)->count();
        $analisis = Analisis::all();
        $datosExif = \App\Models\DatoExif::all();
        
        $stats = [
            'total_imagenes' => $totalImagenes,
            'total_usuarios' => $totalUsuarios,
            'total_analisis' => $analisis->count(),
            'total_exif' => $datosExif->count(),
            'manipuladas' => $analisis->where('resultado', 'manipulada')->count(),
            'limpias' => $analisis->where('resultado', 'limpia')->count(),
            'sospechosas' => $analisis->where('resultado', 'sospechosa')->count(),
            'desconocido' => $analisis->where('resultado', 'desconocido')->count(),
            'pendientes' => $analisis->where('estado', 'en_cola')->count(),
            'procesando' => $analisis->where('estado', 'procesando')->count(),
            'completados' => $analisis->where('estado', 'terminado')->count(),
            'fallidos' => $analisis->where('estado', 'fallo')->count(),
            'imagenes_con_exif' => Imagen::has('datosExif')->count(),
            'imagenes_sin_exif' => Imagen::doesntHave('datosExif')->count(),
        ];

        $stats['porcentaje_manipuladas'] = $stats['total_analisis'] > 0 ? 
            round(($stats['manipuladas'] / $stats['total_analisis']) * 100, 2) : 0;
        $stats['porcentaje_limpias'] = $stats['total_analisis'] > 0 ? 
            round(($stats['limpias'] / $stats['total_analisis']) * 100, 2) : 0;
        $stats['porcentaje_sospechosas'] = $stats['total_analisis'] > 0 ? 
            round(($stats['sospechosas'] / $stats['total_analisis']) * 100, 2) : 0;
        $stats['tasa_completados'] = $stats['total_analisis'] > 0 ? 
            round(($stats['completados'] / $stats['total_analisis']) * 100, 2) : 0;
        $stats['tasa_exito'] = ($stats['completados'] + $stats['fallidos']) > 0 ? 
            round(($stats['completados'] / ($stats['completados'] + $stats['fallidos'])) * 100, 2) : 0;

        $porFormato = Imagen::select('mime', \DB::raw('count(*) as total'))
            ->whereNotNull('mime')
            ->groupBy('mime')
            ->orderBy('total', 'desc')
            ->get();

        $porEstado = Analisis::select('estado', \DB::raw('count(*) as total'))
            ->whereNotNull('estado')
            ->groupBy('estado')
            ->get();
            
        $porResultado = Analisis::select('resultado', \DB::raw('count(*) as total'))
            ->whereNotNull('resultado')
            ->groupBy('resultado')
            ->get();

        $fabricantesCamaras = \App\Models\DatoExif::select('fabricante_camara', \DB::raw('count(*) as total'))
            ->whereNotNull('fabricante_camara')
            ->groupBy('fabricante_camara')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
            
        $modelosCamaras = \App\Models\DatoExif::select('modelo_camara', \DB::raw('count(*) as total'))
            ->whereNotNull('modelo_camara')
            ->groupBy('modelo_camara')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        $usuariosMasActivos = \App\Models\Usuario::withCount('imagenes')
            ->where('activo', true)
            ->orderBy('imagenes_count', 'desc')
            ->limit(5)
            ->get();

        $probabilidadPromedio = Analisis::where('resultado', 'manipulada')
            ->whereNotNull('probabilidad')
            ->avg('probabilidad');

        $imagenesPorDia = Imagen::selectRaw('DATE(created_at) as fecha, count(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('fecha')
            ->orderBy('fecha', 'desc')
            ->limit(7)
            ->get();

        $pdf = Pdf::loadView('reportes.estadisticos.general', compact(
            'stats', 
            'porFormato', 
            'porEstado', 
            'porResultado',
            'fabricantesCamaras',
            'modelosCamaras',
            'usuariosMasActivos',
            'probabilidadPromedio',
            'imagenesPorDia'
        ));
        
        return $pdf->download('reporte_general_completo_' . date('Y-m-d') . '.pdf');
    }
}
