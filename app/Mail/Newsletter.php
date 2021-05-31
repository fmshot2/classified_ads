<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $username, $category, $subject, $header_title, $intro, $services, $email, $unique_identifier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $category, $subject, $header_title, $intro, $services, $email, $unique_identifier)
    // public function __construct()
    {
        $this->username = $username;
        $this->category = $category;
        $this->services = $services;
        $this->subject = $subject;
        $this->intro = $intro;
        $this->header_title = $header_title;
        $this->email = $email;
        $this->unique_identifier = $unique_identifier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.newsletters.newsletter')->subject($this->subject);
    }
}
