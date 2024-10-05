<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComplaintCompleted extends Mailable
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
            subject: 'Complaint Completed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.complaint-completed',
        );
    }

    public function build()
    {
        $email = $this->subject('Complaint Completed Successfully')
            ->view('emails.complaint-completed');

        if ($this->complaint->completionImages->count()) {
            foreach ($this->complaint->completionImages as $image) {
                $email->attach(storage_path('app/public/' . $image->file_path));
            }
        }

        return $email;
    }

    public function attachments(): array
    {
        return [];
    }
}
