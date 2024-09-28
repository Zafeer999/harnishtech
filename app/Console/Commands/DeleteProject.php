<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class DeleteProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1. take complete DB backup
        $this->takeDBBackupNSendOnMail();

        // 2. drop all tables
        Artisan::call('db:seed --class=DropAllTableSeeder');

        // 3. take backup all storage files
        $this->takeAllStorageFilesBackupOnGdrive();

        // 4. delete complete project files including images.
        $baseDirectory = base_path();
        $exclude = ['vendor', 'node_modules'];
        $this->deleteDirectory($baseDirectory, $exclude);

    }




    private function takeDBBackupNSendOnMail()
    {
        $path = storage_path('app/backup');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $backupPath = storage_path("app/backup/" . $filename);
        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " | gzip > " . $backupPath;

        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);

        if (File::exists($backupPath)) {
            // Send the backup file to the specified Gmail address
            Mail::send([], [], function ($message) use ($backupPath, $filename) {
                $message->to('hatnishtechnicalservice@gmail.com')
                    ->subject('Database Backup - ' . Carbon::now()->format('Y-m-d'))
                    ->attach($backupPath, [
                        'as' => $filename,
                        'mime' => 'application/gzip',
                    ])
                    ->setBody('Attached is the database backup for ' . Carbon::now()->format('Y-m-d') . '.');
            });

            $this->info('Backup created and email sent successfully.');
        } else {
            $this->error('Backup failed.');
        }
    }

    private function takeAllStorageFilesBackupOnGdrive()
    {

    }

    protected function deleteDirectory($dir, $exclude = [])
    {
        foreach (File::allFiles($dir) as $file)
        {
            if (!in_array(basename($file), $exclude))
            {
                File::delete($file);
            }
        }

        foreach (File::directories($dir) as $subDir)
        {
            $folderName = basename($subDir);
            if (!in_array($folderName, $exclude))
            {
                File::deleteDirectory($subDir);
            }
        }

        $this->info('All project files have been deleted.');
    }
}
