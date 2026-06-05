<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    public function index()
    {
        $backupDir = storage_path('app/backups');
        $backups = [];
        
        if (File::exists($backupDir)) {
            $files = File::files($backupDir);
            
            foreach ($files as $file) {
                $backups[] = [
                    'nombre' => $file->getFilename(),
                    'fecha' => date('d/m/Y H:i:s', $file->getMTime()),
                    'tamaño' => $this->formatBytes($file->getSize())
                ];
            }
            
            usort($backups, function($a, $b) {
                return strtotime($b['fecha']) - strtotime($a['fecha']);
            });
        }
        
        return view('backups.index', compact('backups'));
    }

    public function create()
    {
        try {
            Artisan::call('backup:database');
            return redirect()->back()->with('success', 'Backup creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el backup: ' . $e->getMessage());
        }
    }

    public function download($filename)
    {
        $filepath = storage_path('app/backups/' . $filename);
        
        if (File::exists($filepath)) {
            return response()->download($filepath);
        }
        
        return redirect()->back()->with('error', 'Archivo no encontrado');
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
