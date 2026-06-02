<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public string $replyMessage;
    public string $clientName;

    public function __construct(string $clientName, string $replyMessage)
    {
        $this->clientName   = $clientName;
        $this->replyMessage = $replyMessage;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reply from Ekram Hossen — Portfolio',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-reply',
        );
    }
}