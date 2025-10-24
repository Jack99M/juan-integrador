<?php

namespace App\Http\Controllers;

use App\Models\DatoExif;
use App\Models\Imagen;
use Illuminate\Http\Request;

class DatoExifController extends Controller
{
    /**
     * Mostrar listado de todos los EXIF.
     */
    public function index()
    {
        $exifs = DatoExif::all(); // devuelve todos los EXIF
        $imagenes = Imagen::where('activo', true)->get();
        return view('datoexif.index', compact('exifs', 'imagenes'));
    }

    /**
     * Formulario de creación de un nuevo EXIF.
     */
    public function create()
    {
        $imagenes = Imagen::where('activo', true)->get(); // Solo imágenes activas
        return view('datoexif.create', compact('imagenes'));
    }

    /**
     * Guardar un nuevo EXIF.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cod_exif' => 'required|unique:datos_exif,cod_exif|max:50',
            'imagen_id' => 'required|exists:imagenes,id',
            'fabricante_camara' => 'nullable|max:100',
            'modelo_camara' => 'nullable|max:100',
            'software' => 'nullable|max:100',
            'fecha_captura' => 'nullable|date',
            'datos_crudos' => 'nullable|json',
        ]);

        DatoExif::create($request->all());

        return redirect()->route('datos_exif.index')->with('success', 'Datos EXIF creados correctamente.');
    }

    /**
     * Formulario de edición de un EXIF.
     */
    public function edit(DatoExif $datos_exif)
    {
        $imagenes = Imagen::where('activo', true)->get();
        return view('datoexif.edit', compact('datos_exif', 'imagenes'));
    }

    /**
     * Actualizar un EXIF.
     */
    public function update(Request $request, DatoExif $datos_exif)
    {
        $request->validate([
            'cod_exif' => 'required|max:50|unique:datos_exif,cod_exif,' . $datos_exif->id,
            'imagen_id' => 'required|exists:imagenes,id',
            'fabricante_camara' => 'nullable|max:100',
            'modelo_camara' => 'nullable|max:100',
            'software' => 'nullable|max:100',
            'fecha_captura' => 'nullable|date',
            'datos_crudos' => 'nullable|json',
        ]);

        $datos_exif->update($request->all());

        return redirect()->route('datos_exif.index')->with('success', 'Datos EXIF actualizados correctamente.');
    }

    /**
     * Mostrar detalle de un EXIF.
     */
    public function show(DatoExif $datos_exif)
    {
        return view('datoexif.show', compact('datos_exif'));
    }
}
