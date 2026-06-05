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
            ['cod_exif' => 'EXIF-001', 'imagen_id' => 1, 'fabricante_camara' => 'Canon', 'modelo_camara' => 'EOS 5D Mark IV', 'software' => 'Adobe Photoshop', 'fecha_captura' => '2025-01-15 12:30:00', 'datos_crudos' => json_encode(['ISO' => 400, 'Aperture' => 'f/2.8', 'ShutterSpeed' => '1/250', 'FocalLength' => '85mm', 'GPS' => ['Latitude' => '-12.0464', 'Longitude' => '-77.0428']])],
            ['cod_exif' => 'EXIF-002', 'imagen_id' => 2, 'fabricante_camara' => 'Sony', 'modelo_camara' => 'Alpha A7R IV', 'software' => 'ILCE-7RM4 v3.10', 'fecha_captura' => '2025-01-16 14:15:00', 'datos_crudos' => json_encode(['ISO' => 800, 'Aperture' => 'f/4.0', 'ShutterSpeed' => '1/60', 'FocalLength' => '24mm'])],
            ['cod_exif' => 'EXIF-003', 'imagen_id' => 3, 'fabricante_camara' => 'Apple', 'modelo_camara' => 'iPhone 14 Pro', 'software' => 'iOS 16.1.2', 'fecha_captura' => '2025-01-17 16:00:00', 'datos_crudos' => json_encode(['ISO' => 64, 'Aperture' => 'f/1.78', 'ShutterSpeed' => '1/120', 'FocalLength' => '6.86mm', 'GPS' => ['Latitude' => '-11.9129', 'Longitude' => '-77.0285']])],
            ['cod_exif' => 'EXIF-004', 'imagen_id' => 4, 'fabricante_camara' => 'Nikon', 'modelo_camara' => 'D850', 'software' => 'Ver.1.20', 'fecha_captura' => '2025-01-18 18:45:00', 'datos_crudos' => json_encode(['ISO' => 200, 'Aperture' => 'f/5.6', 'ShutterSpeed' => '1/500', 'FocalLength' => '70mm', 'Flash' => 'Flash Fired'])],
            ['cod_exif' => 'EXIF-005', 'imagen_id' => 5, 'fabricante_camara' => 'Canon', 'modelo_camara' => 'EOS R6', 'software' => 'Canon EOS R6 Firmware', 'fecha_captura' => '2025-01-19 10:30:00', 'datos_crudos' => json_encode(['ISO' => 1600, 'Aperture' => 'f/1.4', 'ShutterSpeed' => '1/100', 'FocalLength' => '50mm', 'GPS' => ['Latitude' => '-12.1036', 'Longitude' => '-77.0428']])],
            ['cod_exif' => 'EXIF-006', 'imagen_id' => 6, 'fabricante_camara' => 'Samsung', 'modelo_camara' => 'Galaxy S23 Ultra', 'software' => 'Android 13', 'fecha_captura' => '2025-01-20 09:15:00', 'datos_crudos' => json_encode(['ISO' => 50, 'Aperture' => 'f/1.7', 'ShutterSpeed' => '1/200', 'FocalLength' => '6.4mm'])],
            ['cod_exif' => 'EXIF-007', 'imagen_id' => 7, 'fabricante_camara' => 'Canon', 'modelo_camara' => 'EOS R5', 'software' => 'Firmware 1.8.0', 'fecha_captura' => '2025-01-21 11:45:00', 'datos_crudos' => json_encode(['ISO' => 320, 'Aperture' => 'f/2.0', 'ShutterSpeed' => '1/320', 'FocalLength' => '50mm'])],
            ['cod_exif' => 'EXIF-008', 'imagen_id' => 8, 'fabricante_camara' => 'Sony', 'modelo_camara' => 'A7 III', 'software' => 'ILCE-7M3 v4.0', 'fecha_captura' => '2025-01-22 13:20:00', 'datos_crudos' => json_encode(['ISO' => 640, 'Aperture' => 'f/3.5', 'ShutterSpeed' => '1/125', 'FocalLength' => '35mm'])],
            ['cod_exif' => 'EXIF-009', 'imagen_id' => 9, 'fabricante_camara' => 'Nikon', 'modelo_camara' => 'Z6 II', 'software' => 'Ver.1.40', 'fecha_captura' => '2025-01-23 15:30:00', 'datos_crudos' => json_encode(['ISO' => 100, 'Aperture' => 'f/8.0', 'ShutterSpeed' => '1/640', 'FocalLength' => '24mm'])],
            ['cod_exif' => 'EXIF-010', 'imagen_id' => 10, 'fabricante_camara' => 'Canon', 'modelo_camara' => 'EOS 90D', 'software' => 'Firmware 1.2.0', 'fecha_captura' => '2025-01-24 17:00:00', 'datos_crudos' => json_encode(['ISO' => 800, 'Aperture' => 'f/5.0', 'ShutterSpeed' => '1/800', 'FocalLength' => '200mm'])],
            ['cod_exif' => 'EXIF-011', 'imagen_id' => 11, 'fabricante_camara' => 'Apple', 'modelo_camara' => 'iPhone 13 Pro Max', 'software' => 'iOS 15.6', 'fecha_captura' => '2025-01-25 08:45:00', 'datos_crudos' => json_encode(['ISO' => 32, 'Aperture' => 'f/1.5', 'ShutterSpeed' => '1/150', 'FocalLength' => '5.7mm'])],
            ['cod_exif' => 'EXIF-012', 'imagen_id' => 12, 'fabricante_camara' => 'Sony', 'modelo_camara' => 'A6400', 'software' => 'ILCE-6400 v2.0', 'fecha_captura' => '2025-01-26 10:20:00', 'datos_crudos' => json_encode(['ISO' => 400, 'Aperture' => 'f/4.5', 'ShutterSpeed' => '1/400', 'FocalLength' => '55mm'])],
            ['cod_exif' => 'EXIF-013', 'imagen_id' => 13, 'fabricante_camara' => 'Nikon', 'modelo_camara' => 'D780', 'software' => 'Ver.1.30', 'fecha_captura' => '2025-01-27 12:00:00', 'datos_crudos' => json_encode(['ISO' => 1250, 'Aperture' => 'f/2.8', 'ShutterSpeed' => '1/1000', 'FocalLength' => '70mm'])],
            ['cod_exif' => 'EXIF-014', 'imagen_id' => 14, 'fabricante_camara' => 'Canon', 'modelo_camara' => 'EOS M50 Mark II', 'software' => 'Firmware 1.0.1', 'fecha_captura' => '2025-01-28 14:30:00', 'datos_crudos' => json_encode(['ISO' => 200, 'Aperture' => 'f/3.5', 'ShutterSpeed' => '1/250', 'FocalLength' => '18mm'])],
            ['cod_exif' => 'EXIF-015', 'imagen_id' => 15, 'fabricante_camara' => 'Samsung', 'modelo_camara' => 'Galaxy S22', 'software' => 'Android 12', 'fecha_captura' => '2025-01-29 16:15:00', 'datos_crudos' => json_encode(['ISO' => 80, 'Aperture' => 'f/2.2', 'ShutterSpeed' => '1/180', 'FocalLength' => '7.0mm'])],
        ];

        foreach ($datosExif as $exif) {
            DatoExif::create($exif);
        }
    }
}