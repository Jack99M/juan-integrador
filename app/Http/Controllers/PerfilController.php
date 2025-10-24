<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show()
    {
        $usuario = Auth::user();
        return view('perfil.show', compact('usuario'));
    }

    public function edit()
    {
        $usuario = Auth::user();
        return view('perfil.edit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();
        
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'nullable|max:100',
            'email' => 'required|email|max:150|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|min:6|confirmed',
            'organizacion' => 'nullable|max:150',
        ]);

        $data = $request->only('nombre', 'apellido_paterno', 'apellido_materno', 'email', 'organizacion');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('perfil.show')->with('success', 'Perfil actualizado correctamente.');
    }
}