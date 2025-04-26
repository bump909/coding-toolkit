<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class SendTestMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {recipient}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipient = $this->argument('recipient');

        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address.');
            return;
        }

        Mail::to($recipient)->send(new TestMail());

        $this->info("Test email sent to {$recipient}!");
    }
}
