<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSolicitacaoStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($responsavel, $avaliacao)
    {
        $this->responsavel = $responsavel;
        $this->avaliacao = $avaliacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $responsavel = $this->responsavel;
        $avaliacao = $this->avaliacao;
        return $this->subject('Status da Solicitação - CEUA')
            ->from('naoresponder.lmts@gmail.com', 'Ceua - LMTS')
            ->view('mail.solicitacaoStatus', compact('responsavel', 'avaliacao'));
    }
}
