<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $username;
    public $subject = "Bienvenido a Ahorra PC";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$username)
    {
        $this->token=$token;
        $this->username=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.register');
    }
}
