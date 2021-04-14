<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredentialsReset extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $email, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name = 'Phillip Jader', $email = 'email@ase.com', $password = 'fher4uiueh4849')
    {
        $this->name = explode(' ', trim($name))[0];
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.credentials-reset')->subject('Your new login credentials to efcontact!');
    }
}
