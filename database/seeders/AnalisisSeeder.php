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
            ['cod_analisis' => 'ANL-001', 'imagen_id' => 1, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 94.75, 'ruta_mapa_calor' => 'mapas_calor/anl_001_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'JPEG_Compression', 'Noise_Analysis'], 'tiempo_procesamiento' => '2.5s', 'observaciones' => 'Imagen verificada como auténtica']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-002', 'imagen_id' => 2, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'desconocido', 'probabilidad' => null, 'ruta_mapa_calor' => null, 'detalles' => json_encode(['algoritmos_usados' => ['ELA'], 'estado_procesamiento' => 'Analizando compresión JPEG', 'progreso' => '65%']), 'estado' => 'procesando', 'activo' => true],
            ['cod_analisis' => 'ANL-003', 'imagen_id' => 3, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'manipulada', 'probabilidad' => 87.50, 'ruta_mapa_calor' => 'mapas_calor/anl_003_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Copy_Move', 'Splicing_Detection'], 'areas_manipuladas' => [['x' => 300, 'y' => 200, 'width' => 80, 'height' => 60, 'tipo' => 'clonado']], 'tiempo_procesamiento' => '4.2s', 'observaciones' => 'Evidencia de manipulación digital']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-004', 'imagen_id' => 4, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 92.80, 'ruta_mapa_calor' => 'mapas_calor/anl_004_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'JPEG_Compression', 'Noise_Analysis'], 'tiempo_procesamiento' => '3.1s', 'observaciones' => 'Imagen auténtica']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-005', 'imagen_id' => 5, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'sospechosa', 'probabilidad' => 76.30, 'ruta_mapa_calor' => 'mapas_calor/anl_005_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Noise_Analysis'], 'tiempo_procesamiento' => '2.8s', 'observaciones' => 'Posibles alteraciones menores']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-006', 'imagen_id' => 6, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 96.20, 'ruta_mapa_calor' => 'mapas_calor/anl_006_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'JPEG_Compression'], 'tiempo_procesamiento' => '2.1s', 'observaciones' => 'Sin alteraciones detectadas']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-007', 'imagen_id' => 7, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'manipulada', 'probabilidad' => 91.45, 'ruta_mapa_calor' => 'mapas_calor/anl_007_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Copy_Move'], 'tiempo_procesamiento' => '3.7s', 'observaciones' => 'Manipulación detectada en zona central']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-008', 'imagen_id' => 8, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'desconocido', 'probabilidad' => null, 'ruta_mapa_calor' => null, 'detalles' => json_encode(['algoritmos_usados' => [], 'estado_procesamiento' => 'En cola', 'prioridad' => 'normal']), 'estado' => 'en_cola', 'activo' => true],
            ['cod_analisis' => 'ANL-009', 'imagen_id' => 9, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 89.60, 'ruta_mapa_calor' => 'mapas_calor/anl_009_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Noise_Analysis'], 'tiempo_procesamiento' => '2.9s', 'observaciones' => 'Imagen original sin modificaciones']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-010', 'imagen_id' => 10, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'sospechosa', 'probabilidad' => 72.15, 'ruta_mapa_calor' => 'mapas_calor/anl_010_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'JPEG_Compression'], 'tiempo_procesamiento' => '3.3s', 'observaciones' => 'Inconsistencias en compresión']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-011', 'imagen_id' => 11, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'desconocido', 'probabilidad' => null, 'ruta_mapa_calor' => null, 'detalles' => json_encode(['algoritmos_usados' => ['ELA'], 'estado_procesamiento' => 'Procesando', 'progreso' => '45%']), 'estado' => 'procesando', 'activo' => true],
            ['cod_analisis' => 'ANL-012', 'imagen_id' => 12, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 93.80, 'ruta_mapa_calor' => 'mapas_calor/anl_012_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Metadata_Analysis'], 'tiempo_procesamiento' => '2.6s', 'observaciones' => 'Metadatos consistentes']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-013', 'imagen_id' => 13, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'manipulada', 'probabilidad' => 84.90, 'ruta_mapa_calor' => 'mapas_calor/anl_013_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Splicing_Detection'], 'tiempo_procesamiento' => '4.5s', 'observaciones' => 'Splicing detectado']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-014', 'imagen_id' => 14, 'usuario_id' => $usuarios->where('nombre', 'Daniela Patricia')->first()->id, 'resultado' => 'limpia', 'probabilidad' => 97.10, 'ruta_mapa_calor' => 'mapas_calor/anl_014_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'JPEG_Compression', 'Noise_Analysis'], 'tiempo_procesamiento' => '2.3s', 'observaciones' => 'Alta confianza de autenticidad']), 'estado' => 'terminado', 'activo' => true],
            ['cod_analisis' => 'ANL-015', 'imagen_id' => 15, 'usuario_id' => $usuarios->where('nombre', 'Rodrigo Esteban')->first()->id, 'resultado' => 'sospechosa', 'probabilidad' => 68.75, 'ruta_mapa_calor' => 'mapas_calor/anl_015_heatmap.png', 'detalles' => json_encode(['algoritmos_usados' => ['ELA', 'Copy_Move'], 'tiempo_procesamiento' => '3.9s', 'observaciones' => 'Patrones sospechosos detectados']), 'estado' => 'terminado', 'activo' => true],
        ];

        foreach ($analisis as $item) {
            Analisis::create($item);
        }
    }
}