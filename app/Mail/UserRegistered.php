<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $password, $accountType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password, $accountType)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->accountType = $accountType;
        // $name, $email, $password, $userRole
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-registered')->subject('Account Created!');
    }
}
