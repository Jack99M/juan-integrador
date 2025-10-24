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

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    // Dashboard - Todos los roles
    Route::get('/', [DashboardController::class, 'index']);
    
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
    });
    
    // Gestión de Imágenes - Admin y Analista
    Route::middleware('role:Administrador,Analista')->group(function () {
        Route::resource('imagenes', ImagenController::class)->parameters(['imagenes' => 'imagen']);
        Route::post('imagenes/{id}/reactivar', [ImagenController::class, 'reactivar'])->name('imagenes.reactivar');
        
        Route::resource('datos_exif', DatoExifController::class);
    });
    
    // Análisis - Admin, Analista y Investigador
    Route::middleware('role:Administrador,Analista,Investigador')->group(function () {
        Route::resource('analisis', AnalisisController::class)->parameters(['analisis' => 'analisis']);
        Route::post('analisis/{id}/reactivar', [AnalisisController::class, 'reactivar'])->name('analisis.reactivar');
    });
    
    // Reportes - Todos los roles
    Route::resource('reportes', ReporteController::class);
    Route::post('reportes/{id}/reactivar', [ReporteController::class, 'reactivar'])->name('reportes.reactivar');
});
