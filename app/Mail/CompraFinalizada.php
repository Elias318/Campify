<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompraFinalizada extends Mailable
{
    use Queueable, SerializesModels;

    public $productos;
    public $usuario;
  
    public function __construct($productos, $usuario)
    {
        $this-> productos =$productos;
        $this -> usuario = $usuario;

    }

    /**
     *Encabezado del mail.
     */
    public function envelope(): Envelope
    {
         return new Envelope(
            subject: 'Confirmación de Compra - ' . now()->format('d/m/Y H:i'),
        );
    }

    /**
     * ACA VA EL NOMBRE DE LA VISTA DONDE SE ARMA COMO SE VE EL MAIL .
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.compra_finalizada', // Vista del email
            with: [
                'productos' => $this->productos,
                'usuario' => $this->usuario,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
