<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeasonGreetings extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $message, $subject, $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $subject, $name)
    {
        $this->message = $message;
        $this->subject = $subject;
        $this->name = explode(' ', trim($name))[0];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.users.season-greetings')->subject($this->subject);
    }
}
