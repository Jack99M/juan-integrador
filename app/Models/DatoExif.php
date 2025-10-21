<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoExif extends Model
{
    use HasFactory;

    protected $table = 'datos_exif';

    protected $fillable = [
        'cod_exif',
        'imagen_id',
        'fabricante_camara',
        'modelo_camara',
        'software',
        'fecha_captura',
        'datos_crudos',
    ];

    protected $casts = [
        'fecha_captura' => 'datetime',
        'datos_crudos' => 'array', // convierte JSON automáticamente a array
    ];

    // Relación inversa con Imagen
    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }
}
