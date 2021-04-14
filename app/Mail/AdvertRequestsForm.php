<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvertRequestsForm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name, $email, $subject, $advert_type, $message, $phone, $advert_referral_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $advert_type, $message, $phone, $advert_referral_name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->advert_type = $advert_type;
        $this->message = $message;
        $this->phone = $phone;
        $this->advert_referral_name = $advert_referral_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.advertrequestsform')->subject('A user requested for an advert placement!');
    }
}
