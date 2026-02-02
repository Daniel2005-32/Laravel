<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearSessionCommand extends Command
{
    protected $signature = 'session:clear';
    protected $description = 'Clear all session files';

    public function handle()
    {
        $sessionPath = storage_path('framework/sessions');
        
        if (File::exists($sessionPath)) {
            File::cleanDirectory($sessionPath);
            $this->info('Session files cleared successfully.');
        } else {
            $this->error('Session directory not found.');
        }
        
        return 0;
    }
}