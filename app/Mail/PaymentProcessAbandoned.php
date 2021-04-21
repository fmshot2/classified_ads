<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentProcessAbandoned extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject='raejgojr defj', $message='aewfij eargure')
    {
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
        return $this->from('noreply@efcontact.com')->markdown('emails.payments.payment-process-abandoned')->subject($this->subject);
    }
}
