<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public string $nombre, $apellido, $telefono, $email, $puesto, $cvPath;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $apellido, $telefono, $email, $puesto, $cvPath)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->puesto = $puesto;
        $this->cvPath = $cvPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'byboxer09@gmail.com', // Cambia este correo si necesitas otro remitente
            subject: 'Nuevo CV enviado - ' . $this->puesto,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.formulario',
            with: [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'puesto' => $this->puesto,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        // Remueve cualquier prefijo de ruta redundante
        $cvFileName = basename($this->cvPath); // Asegura que solo sea el nombre del archivo
        $cvFullPath = storage_path('app/private/cvs/' . $cvFileName);
    
        // Verifica si el archivo existe
        if (!file_exists($cvFullPath)) {
            throw new \Exception("El archivo no existe: " . $cvFullPath);
        }
    
        // Retorna el adjunto con los detalles necesarios
        return [
            Attachment::fromPath($cvFullPath)
                ->as('CV_' . $this->nombre . '_' . $this->apellido . '.pdf') // Nombre del archivo en el correo
                ->withMime('application/pdf'), // Especificación del tipo MIME
        ];
    }
    

}
