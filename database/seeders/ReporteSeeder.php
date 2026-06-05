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
            ['cod_reporte' => 'REP-001', 'imagen_id' => 1, 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id, 'ruta_pdf' => 'reportes/rep_001.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Periodístico', 'fecha_generacion' => '2025-01-15 10:30:00', 'resumen' => 'Verificación noticia principal', 'resultado_analisis' => 'Limpia', 'probabilidad' => 94.75]), 'activo' => true],
            ['cod_reporte' => 'REP-002', 'imagen_id' => 3, 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id, 'ruta_pdf' => 'reportes/rep_002.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Investigativo', 'fecha_generacion' => '2025-01-16 09:20:00', 'resumen' => 'Investigación especial', 'resultado_analisis' => 'Manipulada', 'probabilidad' => 87.50]), 'activo' => true],
            ['cod_reporte' => 'REP-003', 'imagen_id' => 4, 'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id, 'ruta_pdf' => 'reportes/rep_003.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Entrevista', 'fecha_generacion' => '2025-01-17 16:45:00', 'resumen' => 'Entrevista exclusiva', 'resultado_analisis' => 'Limpia', 'probabilidad' => 92.80]), 'activo' => true],
            ['cod_reporte' => 'REP-004', 'imagen_id' => 5, 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id, 'ruta_pdf' => 'reportes/rep_004.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Técnico', 'fecha_generacion' => '2025-01-18 11:00:00', 'resumen' => 'Análisis técnico imagen sistema', 'resultado_analisis' => 'Sospechosa', 'probabilidad' => 76.30]), 'activo' => true],
            ['cod_reporte' => 'REP-005', 'imagen_id' => 6, 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id, 'ruta_pdf' => 'reportes/rep_005.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Periodístico', 'fecha_generacion' => '2025-01-19 13:30:00', 'resumen' => 'Conferencia de prensa', 'resultado_analisis' => 'Limpia', 'probabilidad' => 96.20]), 'activo' => true],
            ['cod_reporte' => 'REP-006', 'imagen_id' => 7, 'usuario_id' => $usuarios->where('nombre', 'Gabriela Alejandra')->first()->id, 'ruta_pdf' => 'reportes/rep_006.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Social', 'fecha_generacion' => '2025-01-20 15:00:00', 'resumen' => 'Manifestación social', 'resultado_analisis' => 'Manipulada', 'probabilidad' => 91.45]), 'activo' => true],
            ['cod_reporte' => 'REP-007', 'imagen_id' => 9, 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id, 'ruta_pdf' => 'reportes/rep_007.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Cultural', 'fecha_generacion' => '2025-01-21 10:15:00', 'resumen' => 'Evento cultural', 'resultado_analisis' => 'Limpia', 'probabilidad' => 89.60]), 'activo' => true],
            ['cod_reporte' => 'REP-008', 'imagen_id' => 10, 'usuario_id' => $usuarios->where('nombre', 'Luis Miguel')->first()->id, 'ruta_pdf' => 'reportes/rep_008.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Deportivo', 'fecha_generacion' => '2025-01-22 18:00:00', 'resumen' => 'Partido de fútbol', 'resultado_analisis' => 'Sospechosa', 'probabilidad' => 72.15]), 'activo' => true],
            ['cod_reporte' => 'REP-009', 'imagen_id' => 12, 'usuario_id' => $usuarios->where('nombre', 'Valeria Soledad')->first()->id, 'ruta_pdf' => 'reportes/rep_009.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Político', 'fecha_generacion' => '2025-01-23 09:30:00', 'resumen' => 'Reunión gubernamental', 'resultado_analisis' => 'Limpia', 'probabilidad' => 93.80]), 'activo' => true],
            ['cod_reporte' => 'REP-010', 'imagen_id' => 13, 'usuario_id' => $usuarios->where('nombre', 'Cristian David')->first()->id, 'ruta_pdf' => 'reportes/rep_010.pdf', 'reporte_json' => json_encode(['tipo_reporte' => 'Militar', 'fecha_generacion' => '2025-01-24 14:00:00', 'resumen' => 'Desfile militar', 'resultado_analisis' => 'Manipulada', 'probabilidad' => 84.90]), 'activo' => true],
        ];

        foreach ($reportes as $reporte) {
            Reporte::create($reporte);
        }
    }
}