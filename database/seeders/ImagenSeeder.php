<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imagen;
use App\Models\Usuario;

class ImagenSeeder extends Seeder
{
    public function run()
    {
        // Obtener usuarios para asignar imágenes
        $usuarios = Usuario::all();

        $imagenes = [
            [
                'cod_imagen' => 'IMG-001',
                'usuario_id' => $usuarios->where('nombre', 'Roxana')->first()->id ?? 1,
                'nombre_original' => 'langostino.jpg',
                'ruta_almacenamiento' => 'imagenes/langostino_001.jpg',
                'mime' => 'image/jpeg',
                'tamano' => 2456789,
                'estado' => 'subida',
                'activo' => true,
            ],
            [
                'cod_imagen' => 'IMG-002',
                'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id ?? 2,
                'nombre_original' => 'langostino.jpg',
                'ruta_almacenamiento' => 'imagenes/langostino_002.jpg',
                'mime' => 'image/jpeg',
                'tamano' => 1987654,
                'estado' => 'en_cola',
                'activo' => true,
            ],
            [
                'cod_imagen' => 'IMG-003',
                'usuario_id' => $usuarios->where('nombre', 'Maria Fernanda')->first()->id ?? 3,
                'nombre_original' => 'husky.webp',
                'ruta_almacenamiento' => 'imagenes/husky_003.webp',
                'mime' => 'image/webp',
                'tamano' => 3245678,
                'estado' => 'subida',
                'activo' => true,
            ],
            [
                'cod_imagen' => 'IMG-004',
                'usuario_id' => $usuarios->where('nombre', 'Carlos Antonio')->first()->id ?? 4,
                'nombre_original' => 'corgi.webp',
                'ruta_almacenamiento' => 'imagenes/corgi_004.webp',
                'mime' => 'image/webp',
                'tamano' => 2876543,
                'estado' => 'procesando',
                'activo' => true,
            ],
            [
                'cod_imagen' => 'IMG-005',
                'usuario_id' => $usuarios->where('nombre', 'Jose Manuel')->first()->id ?? 5,
                'nombre_original' => 'ardilla.jpg',
                'ruta_almacenamiento' => 'imagenes/ardilla_005.jpg',
                'mime' => 'image/jpeg',
                'tamano' => 1654321,
                'estado' => 'en_cola',
                'activo' => true,
            ],
        ];

        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }
    }
}