<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'cod_rol' => 'ADM-001',
                'nombre' => 'Administrador',
                'descripcion' => 'Acceso total al sistema, con permisos para gestionar usuarios, roles y todas las funciones administrativas',
                'activo' => true,
            ],
            [
                'cod_rol' => 'REP-001',
                'nombre' => 'Reportero',
                'descripcion' => 'Para periodistas/editores que usan el sistema para cargar imágenes, recibir análisis y generar reportes. Tiene acceso operativo, pero no funciones de administración ni de validación avanzada.',
                'activo' => true,
            ],
            [
                'cod_rol' => 'ANL-001',
                'nombre' => 'Analista',
                'descripcion' => 'Encargado de revisar y validar los resultados del análisis. Puede consultar reportes, verificar los metadatos e interpretar los mapas de calor generados. Tiene acceso a estadísticas de uso.',
                'activo' => true,
            ],
        ];

        foreach ($roles as $rol) {
            Rol::create($rol);
        }
    }
}