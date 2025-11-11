<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Obtener roles
        $adminRol = Rol::where('cod_rol', 'ADM-001')->first();
        $reporteroRol = Rol::where('cod_rol', 'REP-001')->first();
        $analistaRol = Rol::where('cod_rol', 'ANL-001')->first();

        $usuarios = [
            // Administradores
            [
                'cod_usuario' => 'USR-001',
                'rol_id' => $adminRol->id,
                'nombre' => 'Juan Luis',
                'apellido_paterno' => 'Mayta',
                'apellido_materno' => 'Sirpa',
                'email' => 'maytajuan314@gmail.com',
                'password' => Hash::make('Admin123'),
                'organizacion' => 'JOTA Verificador',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-002',
                'rol_id' => $adminRol->id,
                'nombre' => 'Carlos Antonio',
                'apellido_paterno' => 'Gonzales',
                'apellido_materno' => 'Choque',
                'email' => 'carlosgon@gmail.com',
                'password' => Hash::make('Carlos123'),
                'organizacion' => 'JOTA Verificador',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-003',
                'rol_id' => $adminRol->id,
                'nombre' => 'Maria Fernanda',
                'apellido_paterno' => 'Lopez',
                'apellido_materno' => 'Quispe',
                'email' => 'mflopez@gmail.com',
                'password' => Hash::make('Maria123'),
                'organizacion' => 'JOTA Verificador',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-004',
                'rol_id' => $adminRol->id,
                'nombre' => 'Pedro Javier',
                'apellido_paterno' => 'Ramos',
                'apellido_materno' => 'Mamani',
                'email' => 'pedro.ramos@gmail.com',
                'password' => Hash::make('Pedro123'),
                'organizacion' => 'JOTA Verificador',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-005',
                'rol_id' => $adminRol->id,
                'nombre' => 'Andrea Paola',
                'apellido_paterno' => 'Choque',
                'apellido_materno' => 'Flores',
                'email' => 'andrea.choque@gmail.com',
                'password' => Hash::make('Andrea123'),
                'organizacion' => 'JOTA Verificador',
                'activo' => true,
            ],
            // Reporteros
            [
                'cod_usuario' => 'USR-006',
                'rol_id' => $reporteroRol->id,
                'nombre' => 'Luis Miguel',
                'apellido_paterno' => 'Catari',
                'apellido_materno' => 'Nina',
                'email' => 'luis.catari@gmail.com',
                'password' => Hash::make('Luis123'),
                'organizacion' => 'Periodismo Digital',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-007',
                'rol_id' => $reporteroRol->id,
                'nombre' => 'Gabriela Alejandra',
                'apellido_paterno' => 'Quispe',
                'apellido_materno' => 'Apaza',
                'email' => 'gaby.quispe@gmail.com',
                'password' => Hash::make('Gaby123'),
                'organizacion' => 'Periodismo Digital',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-015',
                'rol_id' => $reporteroRol->id,
                'nombre' => 'Valeria Soledad',
                'apellido_paterno' => 'Apaza',
                'apellido_materno' => 'Nina',
                'email' => 'valeria.apaza@gmail.com',
                'password' => Hash::make('Valeria123'),
                'organizacion' => 'Periodismo Digital',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-016',
                'rol_id' => $reporteroRol->id,
                'nombre' => 'Cristian David',
                'apellido_paterno' => 'Huanca',
                'apellido_materno' => 'Callisaya',
                'email' => 'cristian.huanca@gmail.com',
                'password' => Hash::make('Cristian123'),
                'organizacion' => 'Periodismo Digital',
                'activo' => true,
            ],
            // Analistas
            [
                'cod_usuario' => 'USR-017',
                'rol_id' => $analistaRol->id,
                'nombre' => 'Rodrigo Esteban',
                'apellido_paterno' => 'Ticona',
                'apellido_materno' => 'Choque',
                'email' => 'rodrigo.ticona@gmail.com',
                'password' => Hash::make('Rodrigo123'),
                'organizacion' => 'Análisis Forense',
                'activo' => true,
            ],
            [
                'cod_usuario' => 'USR-018',
                'rol_id' => $analistaRol->id,
                'nombre' => 'Daniela Patricia',
                'apellido_paterno' => 'Mamani',
                'apellido_materno' => 'Copa',
                'email' => 'daniela.mamani@gmail.com',
                'password' => Hash::make('Daniela123'),
                'organizacion' => 'Análisis Forense',
                'activo' => true,
            ],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }
    }
}