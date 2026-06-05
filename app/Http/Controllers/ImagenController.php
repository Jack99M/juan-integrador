<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Helpers\AuditHelper;

class ImagenController extends Controller
{
    /**
     * Display a listing of active images.
     */
    public function index()
    {
        // Si es reportero, solo ve sus imágenes
        if (auth()->user()->rol->nombre == 'Reportero') {
            $imagenes = Imagen::where('usuario_id', auth()->id())->get();
        } else {
            $imagenes = Imagen::all();
        }
        $usuarios = Usuario::activos()->get();
        
        // Generar siguiente código
        $ultimoCodigo = Imagen::latest('id')->first();
        $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_imagen, 4)) + 1 : 1;
        $siguienteCodigo = 'IMG-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT);
        
        return view('imagenes.index', compact('imagenes', 'usuarios', 'siguienteCodigo'));
    }

    /**
     * Show the form for creating a new image.
     */
    public function create()
    {
        $usuarios = Usuario::activos()->get(); // Solo usuarios activos
        return view('imagenes.create', compact('usuarios'));
    }

    /**
     * Store a newly created image in storage.
     */
    public function store(Request $request)
    {
        // Auto-generar código si no se proporciona
        if (!$request->cod_imagen) {
            $ultimoCodigo = Imagen::latest('id')->first();
            $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_imagen, 4)) + 1 : 1;
            $request->merge(['cod_imagen' => 'IMG-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT)]);
        }
        
        // Validación
        $request->validate([
            'cod_imagen' => 'required|unique:imagenes,cod_imagen|max:50',
            'usuario_id' => 'required|exists:usuarios,id',
            'imagen_archivo' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
            'estado' => 'required|in:subida,en_cola,procesando,terminado,error',
        ]);

        // Guardar archivo en storage/app/public/imagenes
        if ($request->hasFile('imagen_archivo')) {
            $archivo = $request->file('imagen_archivo');
            $ruta = $archivo->store('imagenes', 'public'); // carpeta storage/app/public/imagenes
            $nombreOriginal = $archivo->getClientOriginalName();
            $mime = $archivo->getClientMimeType();
            $tamano = $archivo->getSize();
        }

        // Crear registro en BD
        $imagen = Imagen::create([
            'cod_imagen' => $request->cod_imagen,
            'usuario_id' => $request->usuario_id,
            'nombre_original' => $nombreOriginal ?? null,
            'ruta_almacenamiento' => $ruta ?? null,
            'mime' => $mime ?? null,
            'tamano' => $tamano ?? null,
            'estado' => $request->estado,
            'activo' => true,
        ]);

        AuditHelper::log('crear', 'imagenes', 'Imagen creada: ' . $imagen->nombre_original);

        return redirect()->route('imagenes.index')->with('success', 'Imagen creada correctamente.');
    }

    /**
     * Show the form for editing the specified image.
     */
    public function edit(Imagen $imagen)
    {
        $usuarios = Usuario::activos()->get();
        return view('imagenes.edit', compact('imagen', 'usuarios'));
    }

    /**
     * Update the specified image in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        // Validación
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'imagen_archivo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // opcional
            'nombre_original' => 'required|max:255',
            'estado' => 'required|in:subida,en_cola,procesando,terminado,error',
        ]);

        $data = $request->only('usuario_id', 'nombre_original', 'estado');

        // Si se sube un nuevo archivo, reemplazarlo
        if ($request->hasFile('imagen_archivo')) {
            $archivo = $request->file('imagen_archivo');
            $ruta = $archivo->store('imagenes', 'public');
            $data['ruta_almacenamiento'] = $ruta;
            $data['mime'] = $archivo->getClientMimeType();
            $data['tamano'] = $archivo->getSize();
            $data['nombre_original'] = $archivo->getClientOriginalName();
        }

        $imagen->update($data);

        AuditHelper::log('editar', 'imagenes', 'Imagen editada: ' . $imagen->nombre_original);

        return redirect()->route('imagenes.index')->with('success', 'Imagen actualizada correctamente.');
    }

    /**
     * Soft delete (deactivate) the specified image.
     */
    public function destroy(Imagen $imagen)
    {
        $nombre = $imagen->nombre_original;
        $imagen->update(['activo' => false]);
        AuditHelper::log('eliminar', 'imagenes', 'Imagen desactivada: ' . $nombre);
        return redirect()->route('imagenes.index')->with('success', 'Imagen desactivada correctamente.');
    }

    /**
     * Reactivate a deactivated image.
     */
    public function reactivar($id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->update(['activo' => true]);
        return redirect()->route('imagenes.index')->with('success', 'Imagen reactivada correctamente.');
    }

    public function show(Imagen $imagen)
    {
        return view('imagenes.show', compact('imagen'));
    }
}
