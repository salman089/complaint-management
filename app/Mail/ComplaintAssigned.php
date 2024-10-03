<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComplaintAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public $user_ids;
    public $additional_notes;

    public function __construct(Complaint $complaint, array $user_ids, ?string $additional_notes = null)
    {
        $this->complaint = $complaint;
        $this->user_ids = $user_ids;
        $this->additional_notes = $additional_notes;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Complaint Assigned',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.complaint-assigned',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
