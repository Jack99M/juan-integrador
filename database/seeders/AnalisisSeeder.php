<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Analisis;
use App\Models\Imagen;
use App\Models\Usuario;

class AnalisisSeeder extends Seeder
{
    public function run()
    {
        // Obtener imágenes y usuarios para asignar análisis
        $imagenes = Imagen::all();
        $usuarios = Usuario::all();

        $analisis = [
            [
                'cod_analisis' => 'ANL-001',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-004')->first()->id ?? 1,
                'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id ?? 1,
                'resultado' => 'sospechosa',
                'probabilidad' => 80.25,
                'ruta_mapa_calor' => 'mapas_calor/anl_001_heatmap.png',
                'detalles' => json_encode([
                    'algoritmos_usados' => ['ELA', 'JPEG_Compression', 'Noise_Analysis'],
                    'areas_sospechosas' => [
                        ['x' => 120, 'y' => 80, 'width' => 50, 'height' => 30],
                        ['x' => 200, 'y' => 150, 'width' => 40, 'height' => 25]
                    ],
                    'tiempo_procesamiento' => '2.5 segundos',
                    'observaciones' => 'Inconsistencias en compresión JPEG detectadas'
                ]),
                'estado' => 'terminado',
                'activo' => true,
            ],
            [
                'cod_analisis' => 'ANL-002',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-003')->first()->id ?? 2,
                'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id ?? 2,
                'resultado' => 'sospechosa',
                'probabilidad' => 45.10,
                'ruta_mapa_calor' => null,
                'detalles' => json_encode([
                    'algoritmos_usados' => ['ELA', 'Metadata_Analysis'],
                    'estado_procesamiento' => 'En análisis de metadatos',
                    'progreso' => '75%'
                ]),
                'estado' => 'procesando',
                'activo' => true,
            ],
            [
                'cod_analisis' => 'ANL-003',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-001')->first()->id ?? 3,
                'usuario_id' => $usuarios->where('nombre', 'Alvaro Enrique')->first()->id ?? 3,
                'resultado' => 'manipulada',
                'probabilidad' => 87.50,
                'ruta_mapa_calor' => 'mapas_calor/anl_003_heatmap.png',
                'detalles' => json_encode([
                    'algoritmos_usados' => ['ELA', 'Copy_Move', 'Splicing_Detection'],
                    'areas_manipuladas' => [
                        ['x' => 300, 'y' => 200, 'width' => 80, 'height' => 60, 'tipo' => 'clonado'],
                        ['x' => 150, 'y' => 100, 'width' => 45, 'height' => 35, 'tipo' => 'splicing']
                    ],
                    'tiempo_procesamiento' => '4.2 segundos',
                    'observaciones' => 'Evidencia clara de manipulación digital'
                ]),
                'estado' => 'terminado',
                'activo' => true,
            ],
            [
                'cod_analisis' => 'ANL-004',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-002')->first()->id ?? 4,
                'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id ?? 1,
                'resultado' => 'limpia',
                'probabilidad' => 92.80,
                'ruta_mapa_calor' => 'mapas_calor/anl_004_heatmap.png',
                'detalles' => json_encode([
                    'algoritmos_usados' => ['ELA', 'JPEG_Compression', 'Noise_Analysis', 'Metadata_Analysis'],
                    'tiempo_procesamiento' => '3.1 segundos',
                    'observaciones' => 'Imagen auténtica sin signos de manipulación'
                ]),
                'estado' => 'terminado',
                'activo' => true,
            ],
            [
                'cod_analisis' => 'ANL-005',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-005')->first()->id ?? 5,
                'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id ?? 2,
                'resultado' => 'desconocido',
                'probabilidad' => null,
                'ruta_mapa_calor' => null,
                'detalles' => json_encode([
                    'algoritmos_usados' => [],
                    'estado_procesamiento' => 'En cola de procesamiento',
                    'prioridad' => 'normal'
                ]),
                'estado' => 'en_cola',
                'activo' => true,
            ],
        ];

        foreach ($analisis as $item) {
            Analisis::create($item);
        }
    }
}