<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_auditoria',
        'usuario_id',
        'accion',
        'descripcion',
        'auditable_id',
        'auditable_type'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Polimórfico: auditable
    public function auditable()
    {
        return $this->morphTo();
    }
}
