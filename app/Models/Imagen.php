<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';
    protected $fillable = [
        'cod_imagen',
        'usuario_id',
        'nombre_original',
        'ruta_almacenamiento',
        'mime',
        'tamano',
        'estado',
        'activo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function datosExif()
    {
        return $this->hasMany(DatosExif::class, 'imagen_id');
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class, 'imagen_id');
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'imagen_id');
    }

    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }
}
