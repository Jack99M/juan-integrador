<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Helpers\AuditHelper;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->with('rol')->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
        }

        if (!$usuario->activo) {
            return back()->withErrors(['email' => 'Esta cuenta ha sido desactivada por múltiples intentos fallidos.']);
        }

        if (Hash::check($request->password, $usuario->password)) {
            $usuario->update(['intentos_fallidos' => 0]);
            Auth::login($usuario);
            
            AuditHelper::log('login', 'auth', 'Inicio de sesión exitoso');
            
            switch ($usuario->rol->cod_rol) {
                case 'ADM-001':
                    return redirect()->intended('/dashboard/administrador');
                case 'REP-001':
                    return redirect()->intended('/dashboard/reportero');
                case 'ANL-001':
                    return redirect()->intended('/dashboard/analista');
                default:
                    return redirect()->intended('/');
            }
        }

        $usuario->increment('intentos_fallidos');
        
        if ($usuario->intentos_fallidos >= 3) {
            $usuario->update(['activo' => false]);
            AuditHelper::log('bloqueo', 'auth', 'Cuenta bloqueada por 3 intentos fallidos: ' . $usuario->email);
            return back()->withErrors(['email' => 'Cuenta desactivada por múltiples intentos fallidos. Contacte al administrador.']);
        }

        $intentosRestantes = 3 - $usuario->intentos_fallidos;
        return back()->withErrors(['email' => "Credenciales incorrectas. Intentos restantes: {$intentosRestantes}"]);
    }

    public function logout()
    {
        AuditHelper::log('logout', 'auth', 'Cierre de sesión');
        Auth::logout();
        return redirect()->route('login');
    }
}