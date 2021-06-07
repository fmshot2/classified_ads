<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientCallbackRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $username, $service_username, $userphone, $service, $serviceSlug;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $service_username, $userphone, $service, $serviceSlug)
    {
        $this->username = $username;
        $this->service_username = $service_username;
        $this->userphone = $userphone;
        $this->service = $service;
        $this->serviceSlug = $serviceSlug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.users.client_callback_request')->subject('A user requested a callback!');
    }
}
