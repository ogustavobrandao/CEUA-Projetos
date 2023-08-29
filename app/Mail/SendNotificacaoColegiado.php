<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificacaoColegiado extends Mailable
{
    use Queueable, SerializesModels;

    protected $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $admin)
    {
        $this->status = $status;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $status = $this->status;
        $admin = $this->admin;


        return $this->subject('Aprovado pelo avaliador - Aguardando Revisão do Colegiado')
            ->from('naoresponder.lmts@gmail.com', 'CEUA - LMTS')
            ->view('mail.notificacaoColegiado', compact('status', 'admin'));
    }
}
