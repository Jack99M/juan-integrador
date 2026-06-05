<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use App\Models\Imagen;
use App\Models\Analisis;
use App\Models\Reporte;
use App\Models\DatoExif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_usuarios' => Usuario::count(),
            'usuarios_activos' => Usuario::where('activo', true)->count(),
            'total_roles' => Rol::count(),
            'total_imagenes' => Imagen::count(),
            'imagenes_activas' => Imagen::where('activo', true)->count(),
            'total_analisis' => Analisis::count(),
            'analisis_completados' => Analisis::where('estado', 'completado')->count(),
            'imagenes_manipuladas' => Analisis::where('resultado', 'manipulada')->count(),
            'imagenes_autenticas' => Analisis::where('resultado', 'limpia')->count(),
            'total_reportes' => Reporte::count(),
            'total_exif' => DatoExif::count(),
        ];

        // Últimas imágenes subidas
        $ultimasImagenes = Imagen::with('usuario')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Últimos análisis
        $ultimosAnalisis = Analisis::with(['imagen', 'usuario'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('stats', 'ultimasImagenes', 'ultimosAnalisis'));
    }

    public function administrador()
    {
        $stats = [
            'total_usuarios' => Usuario::count(),
            'usuarios_activos' => Usuario::where('activo', true)->count(),
            'total_roles' => Rol::count(),
            'total_imagenes' => Imagen::count(),
            'imagenes_activas' => Imagen::where('activo', true)->count(),
            'total_analisis' => Analisis::count(),
            'analisis_completados' => Analisis::where('estado', 'completado')->count(),
            'imagenes_manipuladas' => Analisis::where('resultado', 'manipulada')->count(),
            'imagenes_autenticas' => Analisis::where('resultado', 'limpia')->count(),
            'total_reportes' => Reporte::count(),
            'total_exif' => DatoExif::count(),
        ];

        $ultimasImagenes = Imagen::with('usuario')->orderBy('created_at', 'desc')->limit(5)->get();
        $ultimosAnalisis = Analisis::with(['imagen', 'usuario'])->orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard', compact('stats', 'ultimasImagenes', 'ultimosAnalisis'));
    }

    public function reportero()
    {
        $stats = [
            'total_imagenes' => Imagen::where('usuario_id', Auth::id())->count(),
            'total_reportes' => Reporte::where('usuario_id', Auth::id())->count(),
        ];

        $ultimasImagenes = Imagen::where('usuario_id', Auth::id())
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $ultimosAnalisis = Analisis::whereHas('imagen', function($query) {
            $query->where('usuario_id', Auth::id());
        })->with(['imagen', 'usuario'])->orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard-reportero', compact('stats', 'ultimasImagenes', 'ultimosAnalisis'));
    }

    public function analista()
    {
        $stats = [
            'total_analisis' => Analisis::count(),
            'analisis_completados' => Analisis::where('estado', 'completado')->count(),
            'imagenes_manipuladas' => Analisis::where('resultado', 'manipulada')->count(),
            'imagenes_autenticas' => Analisis::where('resultado', 'limpia')->count(),
            'total_reportes' => Reporte::count(),
            'total_exif' => DatoExif::count(),
        ];

        $ultimasImagenes = Imagen::with('usuario')->orderBy('created_at', 'desc')->limit(5)->get();
        $ultimosAnalisis = Analisis::with(['imagen', 'usuario'])->orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard-analista', compact('stats', 'ultimasImagenes', 'ultimosAnalisis'));
    }
}