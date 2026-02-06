<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ResultsJob implements ShouldQueue
{
    use Queueable;

    // Variable to saved the email gonna sent
    public $email;

    // Data usermail will catch on this
    public function __construct(string $email)
    {
        // The data of usermail who catch on up, will saved on this & will gonna use if time to sent
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Execution to sent the email
        Mail::to('alfexcrstds07@gmail.com')->send(new WelcomeMail());
    }
}
