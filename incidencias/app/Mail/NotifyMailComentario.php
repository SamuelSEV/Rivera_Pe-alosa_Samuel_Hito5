<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMailComentario extends Mailable
{
    use Queueable, SerializesModels;

    public $descripcion;
    public $creador;
   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($creador, $descripcion)
    {
        $this->creador = $creador;
        $this->descripcion = $descripcion;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $creador = $this->creador;
        $descripcion = $this->descripcion;
        
        return $this->view('correo.comentario', compact('creador','descripcion'));
    }
}
