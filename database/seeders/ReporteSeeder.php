<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reporte;
use App\Models\Imagen;
use App\Models\Usuario;

class ReporteSeeder extends Seeder
{
    public function run()
    {
        // Obtener imágenes y usuarios para asignar reportes
        $imagenes = Imagen::all();
        $usuarios = Usuario::all();

        $reportes = [
            [
                'cod_reporte' => 'REP-001',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-004')->first()->id ?? 1,
                'usuario_id' => $usuarios->where('nombre', 'Carlos Antonio')->first()->id ?? 1,
                'ruta_pdf' => null, // Sin PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Técnico',
                    'fecha_generacion' => '2025-09-23 15:30:00',
                    'resumen' => 'Análisis de imagen corgi.webp',
                    'resultado_analisis' => 'Sospechosa',
                    'probabilidad' => 80.25,
                    'observaciones' => 'Se detectaron inconsistencias en la compresión'
                ]),
                'activo' => true,
            ],
            [
                'cod_reporte' => 'REP-002',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-003')->first()->id ?? 2,
                'usuario_id' => $usuarios->where('nombre', 'Maria Fernanda')->first()->id ?? 2,
                'ruta_pdf' => null, // Sin PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Ejecutivo',
                    'fecha_generacion' => '2025-09-23 16:45:00',
                    'resumen' => 'Verificación de autenticidad husky.webp',
                    'resultado_analisis' => 'Sospechosa',
                    'probabilidad' => 45.10,
                    'observaciones' => 'Análisis en proceso, resultados preliminares'
                ]),
                'activo' => true,
            ],
            [
                'cod_reporte' => 'REP-003',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-001')->first()->id ?? 3,
                'usuario_id' => $usuarios->where('nombre', 'Roxana')->first()->id ?? 3,
                'ruta_pdf' => null, // Sin PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Forense',
                    'fecha_generacion' => '2025-09-23 18:20:00',
                    'resumen' => 'Análisis forense completo langostino.jpg',
                    'resultado_analisis' => 'Manipulada',
                    'probabilidad' => 87.50,
                    'observaciones' => 'Evidencia clara de manipulación digital detectada'
                ]),
                'activo' => true,
            ],
            [
                'cod_reporte' => 'REP-004',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-002')->first()->id ?? 4,
                'usuario_id' => $usuarios->where('nombre', 'Jose Manuel')->first()->id ?? 4,
                'ruta_pdf' => null, // Sin PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Técnico',
                    'fecha_generacion' => '2025-09-24 09:15:00',
                    'resumen' => 'Verificación técnica de imagen',
                    'resultado_analisis' => 'Limpia',
                    'probabilidad' => 92.80,
                    'observaciones' => 'Imagen auténtica sin signos de manipulación'
                ]),
                'activo' => true,
            ],
            [
                'cod_reporte' => 'REP-005',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-005')->first()->id ?? 5,
                'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id ?? 5,
                'ruta_pdf' => null, // Sin PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Preliminar',
                    'fecha_generacion' => '2025-09-24 11:30:00',
                    'resumen' => 'Reporte preliminar ardilla.jpg',
                    'resultado_analisis' => 'Desconocido',
                    'probabilidad' => null,
                    'observaciones' => 'Análisis pendiente en cola de procesamiento'
                ]),
                'activo' => true,
            ],
            [
                'cod_reporte' => 'REP-006',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-001')->first()->id ?? 1,
                'usuario_id' => $usuarios->where('nombre', 'Edwin Ricardo')->first()->id ?? null,
                'ruta_pdf' => 'reportes/rep_006_informe_completo.pdf', // Con PDF
                'reporte_json' => json_encode([
                    'tipo_reporte' => 'Completo',
                    'fecha_generacion' => '2025-09-24 14:00:00',
                    'resumen' => 'Informe completo con análisis detallado',
                    'resultado_analisis' => 'Manipulada',
                    'probabilidad' => 87.50,
                    'observaciones' => 'Reporte completo con mapa de calor y análisis técnico'
                ]),
                'activo' => true,
            ],
        ];

        foreach ($reportes as $reporte) {
            Reporte::create($reporte);
        }
    }
}