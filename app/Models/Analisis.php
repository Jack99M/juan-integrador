<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;

    protected $table = 'analisis';
    protected $fillable = [
        'cod_analisis',
        'imagen_id',
        'usuario_id',
        'resultado',
        'probabilidad',
        'ruta_mapa_calor',
        'detalles',
        'estado',
        'activo',
    ];

    protected $casts = [
        'detalles' => 'array',
        'activo' => 'boolean',
        'probabilidad' => 'decimal:2',
    ];

    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}
