<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AgendadaMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $solicitud;

    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function build()
    {
        return $this->view('emails.agendada')
                    ->with(['solicitud' => $this->solicitud]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            //Si se quiere agregar un correo emisor:
            //from: new Address('correo@emisor', 'Nombre emisor'),
            //Se debe agregar el use Illuminate\Mail\Mailables\Address;
            subject: 'No-reply: Agendamento de consulta',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.agendada',
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
