<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Imagen;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Helpers\AuditHelper;

class AnalisisController extends Controller
{
    public function index()
    {
        $analisis = Analisis::all();
        $imagenes = Imagen::where('activo', true)->get();
        $usuarios = Usuario::activos()->get();
        
        // Generar siguiente código
        $ultimoCodigo = Analisis::latest('id')->first();
        $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_analisis, 4)) + 1 : 1;
        $siguienteCodigo = 'ANL-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT);
        
        return view('analisis.index', compact('analisis', 'imagenes', 'usuarios', 'siguienteCodigo'));
    }

    public function create()
    {
        $imagenes = Imagen::activas()->get();
        $usuarios = Usuario::activos()->get();
        return view('analisis.create', compact('imagenes', 'usuarios'));
    }

    public function store(Request $request)
    {
        // Auto-generar código si no se proporciona
        if (!$request->cod_analisis) {
            $ultimoCodigo = Analisis::latest('id')->first();
            $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_analisis, 4)) + 1 : 1;
            $request->merge(['cod_analisis' => 'ANL-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT)]);
        }
        
        $request->validate([
            'cod_analisis' => 'required|unique:analisis,cod_analisis|max:50',
            'imagen_id' => 'required|exists:imagenes,id',
            'usuario_id' => 'nullable|exists:usuarios,id',
            'resultado' => 'required|in:desconocido,limpia,sospechosa,manipulada',
            'probabilidad' => 'nullable|numeric|min:0|max:100',
            'ruta_mapa_calor' => 'nullable|string|max:255',
            'detalles' => 'nullable|json',
            'estado' => 'required|in:en_cola,procesando,terminado,fallo',
        ]);

        $analisis = Analisis::create($request->all());

        AuditHelper::log('crear', 'analisis', 'Análisis creado: ' . $analisis->cod_analisis);

        return redirect()->route('analisis.index')->with('success', 'Análisis creado correctamente.');
    }

    public function edit(Analisis $analisis)
    {
        $imagenes = Imagen::activas()->get();
        $usuarios = Usuario::activos()->get();
        return view('analisis.edit', compact('analisis', 'imagenes', 'usuarios'));
    }

    public function update(Request $request, Analisis $analisis)
    {
        $request->validate([
            'imagen_id' => 'required|exists:imagenes,id',
            'usuario_id' => 'nullable|exists:usuarios,id',
            'resultado' => 'required|in:desconocido,limpia,sospechosa,manipulada',
            'probabilidad' => 'nullable|numeric|min:0|max:100',
            'ruta_mapa_calor' => 'nullable|string|max:255',
            'detalles' => 'nullable|json',
            'estado' => 'required|in:en_cola,procesando,terminado,fallo',
        ]);

        $analisis->update($request->all());

        AuditHelper::log('editar', 'analisis', 'Análisis editado: ' . $analisis->cod_analisis);

        return redirect()->route('analisis.index')->with('success', 'Análisis actualizado correctamente.');
    }

    public function show(Analisis $analisis)
    {
        return view('analisis.show', compact('analisis'));
    }

    public function destroy(Analisis $analisis)
    {
        $codigo = $analisis->cod_analisis;
        $analisis->update(['activo' => false]);
        AuditHelper::log('eliminar', 'analisis', 'Análisis desactivado: ' . $codigo);
        return redirect()->route('analisis.index')->with('success', 'Análisis desactivado correctamente.');
    }

    public function reactivar($id)
    {
        $analisis = Analisis::findOrFail($id);
        $analisis->update(['activo' => true]);
        return redirect()->route('analisis.index')->with('success', 'Análisis reactivado correctamente.');
    }
}
