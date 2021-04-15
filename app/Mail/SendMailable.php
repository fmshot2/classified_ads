<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name;
    public $buyerName;
    //public $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        //
        $this->name = $name;
        //$this->buyerName = $buyerName;
        //$this->message = $message;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
//        return $this->view('view.name');
    return $this->from('info@efcontacts.com')->subject('No Reply')
        ->view('emails.name');

    }
}
