<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $detalle; 
    public function __construct($x)
    {
        $this->detalle = $x;        
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
