<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $messageSlug, $provider_name, $title, $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageSlug, $provider_name, $title, $type)
    {
        $this->provider_name = $provider_name;
        $this->messageSlug = $messageSlug;
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com')->markdown('emails.users.new-message')->subject($this->title);
    }
}
