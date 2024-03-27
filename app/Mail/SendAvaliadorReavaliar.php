<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAvaliadorReavaliar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $user = $this->user;
        return $this->subject('Reavaliação - CEUA')
            ->from('naoresponder.lmts@gmail.com', 'Ceua - LMTS')
            ->view('mail.avaliadorReavaliacao', compact('user'));
    }
}
