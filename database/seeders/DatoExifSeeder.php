<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DatoExif;
use App\Models\Imagen;

class DatoExifSeeder extends Seeder
{
    public function run()
    {
        // Obtener imágenes para asignar datos EXIF
        $imagenes = Imagen::all();

        $datosExif = [
            [
                'cod_exif' => 'EXIF-001',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-001')->first()->id ?? 1,
                'fabricante_camara' => 'Canon',
                'modelo_camara' => 'EOS 5D Mark IV',
                'software' => 'Adobe Photoshop',
                'fecha_captura' => '2025-09-23 12:30:00',
                'datos_crudos' => json_encode([
                    'ISO' => 400,
                    'Aperture' => 'f/2.8',
                    'ShutterSpeed' => '1/250',
                    'FocalLength' => '85mm',
                    'WhiteBalance' => 'Auto',
                    'Flash' => 'No Flash',
                    'GPS' => [
                        'Latitude' => '-12.0464',
                        'Longitude' => '-77.0428'
                    ]
                ]),
            ],
            [
                'cod_exif' => 'EXIF-002',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-002')->first()->id ?? 2,
                'fabricante_camara' => 'Sony',
                'modelo_camara' => 'Alpha A7R IV',
                'software' => 'ILCE-7RM4 v3.10',
                'fecha_captura' => '2025-09-23 14:15:00',
                'datos_crudos' => json_encode([
                    'ISO' => 800,
                    'Aperture' => 'f/4.0',
                    'ShutterSpeed' => '1/60',
                    'FocalLength' => '24mm',
                    'WhiteBalance' => 'Daylight',
                    'Flash' => 'No Flash'
                ]),
            ],
            [
                'cod_exif' => 'EXIF-003',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-003')->first()->id ?? 3,
                'fabricante_camara' => 'Apple',
                'modelo_camara' => 'iPhone 14 Pro',
                'software' => 'iOS 16.1.2',
                'fecha_captura' => '2025-09-23 16:00:00',
                'datos_crudos' => json_encode([
                    'ISO' => 64,
                    'Aperture' => 'f/1.78',
                    'ShutterSpeed' => '1/120',
                    'FocalLength' => '6.86mm',
                    'WhiteBalance' => 'Auto',
                    'Flash' => 'No Flash',
                    'GPS' => [
                        'Latitude' => '-11.9129',
                        'Longitude' => '-77.0285'
                    ]
                ]),
            ],
            [
                'cod_exif' => 'EXIF-004',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-004')->first()->id ?? 4,
                'fabricante_camara' => 'Nikon',
                'modelo_camara' => 'D850',
                'software' => 'Ver.1.20',
                'fecha_captura' => '2025-09-22 18:45:00',
                'datos_crudos' => json_encode([
                    'ISO' => 200,
                    'Aperture' => 'f/5.6',
                    'ShutterSpeed' => '1/500',
                    'FocalLength' => '70mm',
                    'WhiteBalance' => 'Auto',
                    'Flash' => 'Flash Fired'
                ]),
            ],
            [
                'cod_exif' => 'EXIF-005',
                'imagen_id' => $imagenes->where('cod_imagen', 'IMG-005')->first()->id ?? 5,
                'fabricante_camara' => 'Canon',
                'modelo_camara' => 'EOS R6',
                'software' => 'Canon EOS R6 Firmware Version 1.8.1',
                'fecha_captura' => '2025-09-24 10:30:00',
                'datos_crudos' => json_encode([
                    'ISO' => 1600,
                    'Aperture' => 'f/1.4',
                    'ShutterSpeed' => '1/100',
                    'FocalLength' => '50mm',
                    'WhiteBalance' => 'Tungsten',
                    'Flash' => 'No Flash',
                    'GPS' => [
                        'Latitude' => '-12.1036',
                        'Longitude' => '-77.0428'
                    ]
                ]),
            ],
        ];

        foreach ($datosExif as $exif) {
            DatoExif::create($exif);
        }
    }
}