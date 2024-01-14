<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

// 1) add this line to use envelope functions(ex. Address)
use Illuminate\Mail\Mailables\Address;


class MailableName extends Mailable
{
    use Queueable, SerializesModels;
    // 2) add this variable
    //define property called 'data' to be used for all functions in this class
    public $data;

    /**
     * Create a new message instance.
     */
    // 3) edit this function
    //$data here is the variable sent from controller
    public function __construct($data)
    {
        //assign the data sent from controller to the property
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    //envelope is the outer part
    public function envelope(): Envelope
    {
        return new Envelope(
            // 4) add and edit these lines
            from: new Address($this->data['email'], $this->data['name']),
            subject: $this->data['subject'],
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
            // with: [$this->data] --> receive in html: 
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
