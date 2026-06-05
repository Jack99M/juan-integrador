<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\AuditHelper;

class UsuarioController extends Controller
{
    /**
     * Display a listing of active users.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $roles = Rol::activos()->get();
        
        // Generar siguiente código
        $ultimoCodigo = Usuario::latest('id')->first();
        $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_usuario, 4)) + 1 : 1;
        $siguienteCodigo = 'USR-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT);
        
        return view('usuarios.index', compact('usuarios', 'roles', 'siguienteCodigo'));
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
        // Auto-generar código si no se proporciona
        if (!$request->cod_usuario) {
            $ultimoCodigo = Usuario::latest('id')->first();
            $siguienteNumero = $ultimoCodigo ? intval(substr($ultimoCodigo->cod_usuario, 4)) + 1 : 1;
            $request->merge(['cod_usuario' => 'USR-' . str_pad($siguienteNumero, 3, '0', STR_PAD_LEFT)]);
        }
        
        $request->validate([
            'cod_usuario' => 'required|unique:usuarios,cod_usuario|max:50',
            'rol_id' => 'nullable|exists:roles,id',
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'nullable|max:100',
            'email' => 'required|email|unique:usuarios,email|max:150',
            'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/|confirmed',
            'organizacion' => 'nullable|max:150',
        ]);

        $usuario = Usuario::create([
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

        AuditHelper::log('crear', 'usuarios', 'Usuario creado: ' . $usuario->nombre . ' ' . $usuario->apellido_paterno);

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
            'password' => 'nullable|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/|confirmed',
            'organizacion' => 'nullable|max:150',
        ]);

        $data = $request->only('rol_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'organizacion');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        AuditHelper::log('editar', 'usuarios', 'Usuario editado: ' . $usuario->nombre . ' ' . $usuario->apellido_paterno);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Soft delete (deactivate) the specified resource.
     */
    public function destroy(Usuario $usuario)
    {
        $nombre = $usuario->nombre . ' ' . $usuario->apellido_paterno;
        $usuario->update(['activo' => false]);
        AuditHelper::log('eliminar', 'usuarios', 'Usuario desactivado: ' . $nombre);
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
