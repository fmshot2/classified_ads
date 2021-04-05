<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
        Mail::to('paulwhiteblogs@gmail.com')->send(new TestMail());
    }
}
