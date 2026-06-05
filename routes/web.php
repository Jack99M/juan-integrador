<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController; // <- esto faltaba
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\DatoExifController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\BackupController;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    // Dashboard principal - redirige según rol
    Route::get('/', function() {
        $rol = auth()->user()->rol->nombre;
        switch($rol) {
            case 'Administrador':
                return redirect('/dashboard/administrador');
            case 'Reportero':
                return redirect('/dashboard/reportero');
            case 'Analista':
                return redirect('/dashboard/analista');
            default:
                return app(App\Http\Controllers\DashboardController::class)->index();
        }
    })->name('dashboard');
    
    // Dashboards específicos por rol
    Route::get('/dashboard/administrador', [DashboardController::class, 'administrador'])->middleware('role:Administrador');
    Route::get('/dashboard/reportero', [DashboardController::class, 'reportero'])->middleware('role:Reportero');
    Route::get('/dashboard/analista', [DashboardController::class, 'analista'])->middleware('role:Analista');
    
    // Perfil - Todos los usuarios
    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    
    // Administración - Solo Admin
    Route::middleware('role:Administrador')->group(function () {
        Route::resource('roles', RolController::class)->parameters(['roles' => 'rol']);
        Route::post('roles/{rol}/reactivar', [RolController::class, 'reactivar'])->name('roles.reactivar');
        
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
        Route::post('usuarios/{id}/reactivar', [UsuarioController::class, 'reactivar'])->name('usuarios.reactivar');
        
        Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit_logs.index');
        
        Route::get('backups', [BackupController::class, 'index'])->name('backups.index');
        Route::post('backups/create', [BackupController::class, 'create'])->name('backups.create');
        Route::get('backups/{filename}', [BackupController::class, 'download'])->name('backups.download');
    });
    
    // Imágenes - Admin y Reportero
    Route::middleware('role:Administrador,Reportero')->group(function () {
        Route::resource('imagenes', ImagenController::class)->parameters(['imagenes' => 'imagen']);
        Route::post('imagenes/{id}/reactivar', [ImagenController::class, 'reactivar'])->name('imagenes.reactivar');
    });
    
    // Datos EXIF - Admin y Analista
    Route::middleware('role:Administrador,Analista')->group(function () {
        Route::resource('datos_exif', DatoExifController::class);
    });
    
    // Análisis - Admin y Analista
    Route::middleware('role:Administrador,Analista')->group(function () {
        Route::resource('analisis', AnalisisController::class)->parameters(['analisis' => 'analisis']);
        Route::post('analisis/{id}/reactivar', [AnalisisController::class, 'reactivar'])->name('analisis.reactivar');
    });
    
    // Reportes - Todos los roles
    Route::resource('reportes', ReporteController::class);
    Route::post('reportes/{id}/reactivar', [ReporteController::class, 'reactivar'])->name('reportes.reactivar');
    Route::get('reportes/{id}/pdf', [ReporteController::class, 'generarPdf'])->name('reportes.pdf');
    
    // Prototipos - Todos los roles
    Route::prefix('prototipos')->group(function () {
        Route::get('/', function () { return view('prototipos.index'); })->name('prototipos.index');
        Route::get('/usuarios', function () { return view('prototipos.usuarios'); })->name('prototipos.usuarios');
        Route::get('/roles', function () { return view('prototipos.roles'); })->name('prototipos.roles');
        Route::get('/imagenes', function () { return view('prototipos.imagenes'); })->name('prototipos.imagenes');
        Route::get('/analisis', function () { return view('prototipos.analisis'); })->name('prototipos.analisis');
        Route::get('/reportes', function () { return view('prototipos.reportes'); })->name('prototipos.reportes');
        Route::get('/datos-exif', function () { return view('prototipos.datos-exif'); })->name('prototipos.datos-exif');
    });
});
