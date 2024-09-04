<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComplaintCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Complaint Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.complaint-created',
        );
    }



    public function build()
    {
        $email = $this->subject('Complaint Submitted Successfully')
                    ->view('emails.complaint-created');

        if ($this->complaint->file_path) {
            $email->attach(storage_path('app/public/' . $this->complaint->file_path));
        }

        return $email;
    }
    public function attachments(): array
    {
        return [];
    }
}
