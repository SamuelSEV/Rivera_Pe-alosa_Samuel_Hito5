<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $titulo;
    public $descripcion;
    public $aula;
    public $estado;
    public $creador;
  
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $descripcion, $aula, $estado, $creador)
    {
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->aula=$aula;
        $this->estado=$estado;
        $this->creador=$creador;
       

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $titulo= $this->titulo;
        $descripcion= $this->descripcion;
        $aula= $this->aula;
        $estado= $this->estado;
        $creador= $this->creador;
       
        return $this->view('correo.incidencias', compact('titulo','descripcion','aula','estado','creador'));
    }
}
