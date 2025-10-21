<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of active users.
     */
    public function index()
    {
        $usuarios = Usuario::all(); // por ahora todos, luego podemos usar ->activos()
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::activos()->get(); // solo roles activos
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cod_usuario' => 'required|unique:usuarios,cod_usuario|max:50',
            'rol_id' => 'nullable|exists:roles,id',
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'nullable|max:100',
            'email' => 'required|email|unique:usuarios,email|max:150',
            'password' => 'required|min:6|confirmed',
            'organizacion' => 'nullable|max:150',
        ]);

        Usuario::create([
            'cod_usuario' => $request->cod_usuario,
            'rol_id' => $request->rol_id,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'organizacion' => $request->organizacion,
            'activo' => true,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $roles = Rol::activos()->get();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'rol_id' => 'nullable|exists:roles,id',
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'nullable|max:100',
            'email' => 'required|email|max:150|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|min:6|confirmed',
            'organizacion' => 'nullable|max:150',
        ]);

        $data = $request->only('rol_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'organizacion');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Soft delete (deactivate) the specified resource.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->update(['activo' => false]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado correctamente.');
    }

    /**
     * Reactivate a deactivated user.
     */
    public function reactivar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update(['activo' => true]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario reactivado correctamente.');
    }
}
