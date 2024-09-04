<?php

namespace App\Mail;

use App\Models\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class QuotationSent extends Mailable
{
    use Queueable, SerializesModels;

    public $quotation;

    public function __construct(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Quotation Sent',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quotation-sent',
        );
    }


    public function build()
    {
        return $this->view('emails.quotation-sent')
                    ->with([
                        'quotation' => $this->quotation,
                        'complaint' => $this->quotation->complaint,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
