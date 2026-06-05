<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'usuario_id',
        'accion',
        'modulo',
        'descripcion',
        'ip',
        'user_agent'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
