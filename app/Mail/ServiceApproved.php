<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceApproved extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name, $description, $thumbnail, $slug, $status, $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($name = 'Ethipoia', $description = 'efbwe hebfjewhfbj efbfbew hfefjhfwbbewjhfbef hbf  efbh eb  f bffbjfb jefbje', $thumbnail = 'serrt.jpg', $slug = 'ethiopia', $status = 'Disapproved', $reason = 'You are liar!')
    public function __construct($name, $description, $thumbnail, $slug, $status, $reason)
    {
        $this->name = $name;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->slug = $slug;
        $this->status = $status;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.services.service-approved')->subject('You service has been '. $this->status .'!');
    }
}
