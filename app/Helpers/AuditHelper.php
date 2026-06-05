<?php

namespace App\Helpers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AuditHelper
{
    public static function log($accion, $modulo, $descripcion = null)
    {
        AuditLog::create([
            'usuario_id' => Auth::id(),
            'accion' => $accion,
            'modulo' => $modulo,
            'descripcion' => $descripcion,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }
}
