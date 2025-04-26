<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class ClearLogFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear laravel log file';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $logFile = storage_path('logs/laravel.log');

        if (File::exists($logFile)) {
            File::put($logFile, ''); // Clear the file contents
            $this->info('Log file cleared successfully.');
        } else {
            $this->error('Log file does not exist.');
        }
    }
}
