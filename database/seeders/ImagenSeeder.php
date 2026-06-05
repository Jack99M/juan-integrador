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
            ['cod_imagen' => 'IMG-001', 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id ?? 6, 'nombre_original' => 'noticia_principal.jpg', 'ruta_almacenamiento' => 'imagenes/noticia_principal.jpg', 'mime' => 'image/jpeg', 'tamano' => 2048576, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-002', 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id ?? 6, 'nombre_original' => 'evento_deportivo.png', 'ruta_almacenamiento' => 'imagenes/evento_deportivo.png', 'mime' => 'image/png', 'tamano' => 1536000, 'estado' => 'procesando', 'activo' => true],
            ['cod_imagen' => 'IMG-003', 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id ?? 7, 'nombre_original' => 'investigacion_especial.jpg', 'ruta_almacenamiento' => 'imagenes/investigacion_especial.jpg', 'mime' => 'image/jpeg', 'tamano' => 3072000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-004', 'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id ?? 8, 'nombre_original' => 'entrevista_exclusiva.webp', 'ruta_almacenamiento' => 'imagenes/entrevista_exclusiva.webp', 'mime' => 'image/webp', 'tamano' => 1024000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-005', 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id ?? 9, 'nombre_original' => 'imagen_sistema.jpg', 'ruta_almacenamiento' => 'imagenes/imagen_sistema.jpg', 'mime' => 'image/jpeg', 'tamano' => 4096000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-006', 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id ?? 6, 'nombre_original' => 'conferencia_prensa.jpg', 'ruta_almacenamiento' => 'imagenes/conferencia_prensa.jpg', 'mime' => 'image/jpeg', 'tamano' => 2560000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-007', 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id ?? 7, 'nombre_original' => 'manifestacion_social.jpg', 'ruta_almacenamiento' => 'imagenes/manifestacion_social.jpg', 'mime' => 'image/jpeg', 'tamano' => 3584000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-008', 'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id ?? 8, 'nombre_original' => 'accidente_transito.png', 'ruta_almacenamiento' => 'imagenes/accidente_transito.png', 'mime' => 'image/png', 'tamano' => 2048000, 'estado' => 'en_cola', 'activo' => true],
            ['cod_imagen' => 'IMG-009', 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id ?? 9, 'nombre_original' => 'evento_cultural.jpg', 'ruta_almacenamiento' => 'imagenes/evento_cultural.jpg', 'mime' => 'image/jpeg', 'tamano' => 1792000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-010', 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id ?? 6, 'nombre_original' => 'partido_futbol.jpg', 'ruta_almacenamiento' => 'imagenes/partido_futbol.jpg', 'mime' => 'image/jpeg', 'tamano' => 2816000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-011', 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id ?? 7, 'nombre_original' => 'incendio_edificio.jpg', 'ruta_almacenamiento' => 'imagenes/incendio_edificio.jpg', 'mime' => 'image/jpeg', 'tamano' => 3328000, 'estado' => 'procesando', 'activo' => true],
            ['cod_imagen' => 'IMG-012', 'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id ?? 8, 'nombre_original' => 'reunion_gobierno.jpg', 'ruta_almacenamiento' => 'imagenes/reunion_gobierno.jpg', 'mime' => 'image/jpeg', 'tamano' => 2304000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-013', 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id ?? 9, 'nombre_original' => 'desfile_militar.png', 'ruta_almacenamiento' => 'imagenes/desfile_militar.png', 'mime' => 'image/png', 'tamano' => 4096000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-014', 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id ?? 6, 'nombre_original' => 'feria_tecnologia.jpg', 'ruta_almacenamiento' => 'imagenes/feria_tecnologia.jpg', 'mime' => 'image/jpeg', 'tamano' => 1920000, 'estado' => 'terminado', 'activo' => true],
            ['cod_imagen' => 'IMG-015', 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id ?? 7, 'nombre_original' => 'protesta_estudiantes.jpg', 'ruta_almacenamiento' => 'imagenes/protesta_estudiantes.jpg', 'mime' => 'image/jpeg', 'tamano' => 2688000, 'estado' => 'terminado', 'activo' => true],
        ];

        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }
    }
}