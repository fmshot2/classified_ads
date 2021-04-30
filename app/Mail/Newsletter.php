<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $username, $category, $services;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $category, $services)
    // public function __construct()
    {
        $this->username = $username;
        $this->category = $category;
        $this->services = $services;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.newsletters.newsletter')->subject('Most Popular Products and Services!');
    }
}
