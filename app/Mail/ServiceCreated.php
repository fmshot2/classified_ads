<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $category, $phone, $state, $slug;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $category, $phone, $state, $slug)
    {
        $this->name = $name;
        $this->category = $category;
        $this->phone = $phone;
        $this->state = $state;
        $this->slug = $slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.services.service-created')->subject('You created a service!');
    }
}
