<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EarnMoney extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $username, $subject, $header_title, $intro, $body, $tagline, $link, $email, $unique_identifier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $subject, $header_title, $intro, $body, $tagline, $link, $email, $unique_identifier)
    {
        $this->username = $username;
        $this->subject = $subject;
        $this->header_title = $header_title;
        $this->intro = $intro;
        $this->body = $body;
        $this->tagline = $tagline;
        $this->link = $link;
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
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.users.earnmoney')->subject($this->subject);
    }
}
