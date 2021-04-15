<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use App\SendMail;

class SendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $body;
    public $subject;
    public $name;

    public function __construct($body, $subject, $name)
    {
        $this->$body = $body;
        $this->subject = $subject;
        $this->name = $name;
    }

    /**
     * Build the body.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@efcontact.com')->subject($this->subject)->view('emails.bulk-email');
    }
}
