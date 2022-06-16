<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Nota;//nota de venta
    public $tickets; 

    public function __construct($nota,$ticket)
    {
        $this->nota = $nota;      
        $this->tickets=$ticket;  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Resivo de Compra')->view('mail.enviar');
    }
}
