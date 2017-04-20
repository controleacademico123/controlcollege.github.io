<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $address = 'ignore@batcave.io';
      $name = 'Ignore Me';
      $subject = 'Krytonite Found';
      return $this->view('contato')->from($adress,$name)->cc($adress,$name)->bcc($adress,$name)->replyTo($adress,$name)->subject($subject);
    }
}
