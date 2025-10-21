<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cod_rol' => 'required|unique:roles,cod_rol|max:50',
            'nombre' => 'required|unique:roles,nombre|max:100',
            'descripcion' => 'nullable|max:255',
        ]);

        Rol::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $role)
    {
        return view('roles.edit', ['rol' => $role]);
    }


    public function update(Request $request, Rol $role)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
        ]);

        $role->update($request->only('nombre', 'descripcion'));

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $role)
    {
        $role->update(['activo' => false]); 

        return redirect()->route('roles.index')->with('success', 'Rol desactivado correctamente.');
    }

    public function reactivar(Rol $role)
    {
        $role->update(['activo' => true]);
        return redirect()->route('roles.index')->with('success', 'Rol reactivado correctamente.');
    }

}
