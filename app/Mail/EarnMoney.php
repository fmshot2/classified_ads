<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EarnMoney extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $username, $subject, $header_title, $intro, $body, $tagline, $link, $unsublink,$subcopy;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $subject, $header_title, $intro, $body, $tagline, $link, $unsublink,$subcopy)
    {
        $this->username = $username;
        $this->subject = $subject;
        $this->header_title = $header_title;
        $this->intro = $intro;
        $this->body = $body;
        $this->tagline = $tagline;
        $this->link = $link;
        $this->unsublink = $unsublink;
        $this->subcopy = $subcopy;
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
