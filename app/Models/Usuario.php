<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    
    protected $fillable = [
        'cod_usuario',
        'rol_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'organizacion',
        'activo'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

}
