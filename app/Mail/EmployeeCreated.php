<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployeeCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;

    public function __construct(User $employee)
    {
        $this->employee = $employee;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Employee Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.employee-created',
        );
    }

    public function build()
    {
        return $this->view('emails.employee-created')
                    ->with([
                        'employee' => $this->employee,
                    ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
