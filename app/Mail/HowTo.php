<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HowTo extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $username, $email, $unique_identifier, $subject, $introduction, $message, $file_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $email, $unique_identifier, $subject, $introduction, $message, $file_name)
    {
        $this->username = $username;
        $this->email = $email;
        $this->unique_identifier = $unique_identifier;
        $this->subject = $subject;
        $this->introduction = $introduction;
        $this->message = $message;
        $this->file_name = $file_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.howto')->subject($this->subject);
    }
}
