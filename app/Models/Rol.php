<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles'; //Esto fuerza a Laravel a usar "roles" NO TE OLVIDES DE REPETIR ESTO CON LAS DEMAS TABLAS JOTA

    protected $fillable = [
        'cod_rol',
        'nombre',
        'descripcion',
        'activo',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}
