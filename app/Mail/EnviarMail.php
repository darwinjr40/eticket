<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nota;//nota de venta
    public $ticket; 
    //public $imagenes;

    public function __construct($nota,$ticket)//,$imagenes)
    {
        $this->nota = $nota;      
        $this->ticket=$ticket;  
        //$this->imagenes=$imagenes;
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
