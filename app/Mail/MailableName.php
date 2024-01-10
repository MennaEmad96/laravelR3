<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

// 1) add this line
use Illuminate\Mail\Mailables\Address;


class MailableName extends Mailable
{
    use Queueable, SerializesModels;
    // 2) add this variable
    public $data;

    /**
     * Create a new message instance.
     */
    // 3) edit this function
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // 4) add and edit these lines
            from: new Address('menna@gmail.com', 'Menna'),
            subject: 'Email Task',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // 5) add and edit these lines
            view: 'mail.test-email',
            with: ['data' => $this->data],
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
