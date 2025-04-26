<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\TestQueueJob;
use Carbon\Carbon;

class TestQueueCommand extends Command
{
    protected $signature = 'test:queue';
    protected $description = 'Test queue job dispatch';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        TestQueueJob::dispatch()->delay(60);
        $this->info('Test Job dispatched with 1 minute delay');
    }
}
