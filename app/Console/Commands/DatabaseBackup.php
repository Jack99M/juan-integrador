<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Crea un backup de la base de datos y mantiene solo las 3 copias más recientes';

    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        
        $backupDir = storage_path('app/backups');
        
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $filepath = $backupDir . '/' . $filename;

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($host),
            escapeshellarg($database),
            escapeshellarg($filepath)
        );

        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            $this->info('Backup creado exitosamente: ' . $filename);
            $this->cleanOldBackups($backupDir);
            return 0;
        } else {
            $this->error('Error al crear el backup');
            return 1;
        }
    }

    private function cleanOldBackups($backupDir)
    {
        $files = glob($backupDir . '/backup_*.sql');
        
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        $filesToDelete = array_slice($files, 3);

        foreach ($filesToDelete as $file) {
            unlink($file);
            $this->info('Backup antiguo eliminado: ' . basename($file));
        }
    }
}
