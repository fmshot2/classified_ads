<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $agent_name, $agent_email, $password, $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agent_name, $agent_email, $password, $code)
    {
        $this->agent_name = $agent_name;
        $this->agent_email = $agent_email;
        $this->password = $password;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@efcontact.com', 'EFContact')->markdown('emails.agents.agent_registered')->subject('EFContact Agent Registration Successful!');
    }
}
