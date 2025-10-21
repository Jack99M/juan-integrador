<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $fillable = [
        'cod_reporte',
        'imagen_id',
        'usuario_id',
        'ruta_pdf',
        'reporte_json',
        'activo',
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
