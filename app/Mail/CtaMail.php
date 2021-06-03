<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CtaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $email;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $message)
    {
        $this->email = $email;
        $this->mail = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.cta');
    }
}
