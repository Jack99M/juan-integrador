<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController; // <- esto faltaba
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\DatoExifController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\ReporteController;



Route::resource('roles', RolController::class);
Route::post('roles/{role}/reactivar', [RolController::class, 'reactivar'])->name('roles.reactivar');


Route::resource('usuarios', UsuarioController::class)->except(['show']); // omitimos show
Route::post('usuarios/{id}/reactivar', [UsuarioController::class, 'reactivar'])->name('usuarios.reactivar');


Route::resource('imagenes', ImagenController::class)->parameters([
    'imagenes' => 'imagen'
]);
Route::post('imagenes/{id}/reactivar', [ImagenController::class, 'reactivar'])->name('imagenes.reactivar');


Route::resource('datos_exif', DatoExifController::class);


Route::resource('analisis', AnalisisController::class)->parameters([
    'analisis' => 'analisis'
]);
Route::post('analisis/{id}/reactivar', [AnalisisController::class, 'reactivar'])->name('analisis.reactivar');


Route::resource('reportes', ReporteController::class);
Route::post('reportes/{id}/reactivar', [ReporteController::class, 'reactivar'])->name('reportes.reactivar');


Route::get('/', function () {
    return view('welcome');
});
