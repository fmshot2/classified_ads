<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email, $subject, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@efcontact.com', 'EFContact')->markdown('emails.contactus')->subject($this->subject);
    }
}
