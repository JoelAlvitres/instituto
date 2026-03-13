<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Nuevo mensaje de contacto - Instituto Von Humboldt',
            replyTo: [
                new Address($this->data['email'], $this->data['nombre']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-message',
            with: [
                'nombre' => $this->data['nombre'],
                'email' => $this->data['email'],
                'telefono' => $this->data['telefono'] ?? 'No proporcionado',
                'mensaje' => $this->data['mensaje'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
