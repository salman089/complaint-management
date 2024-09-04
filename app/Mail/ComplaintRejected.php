<?php
namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;
    public $rejectionReason;

    public function __construct(Complaint $complaint, $rejectionReason)
    {
        $this->complaint = $complaint;
        $this->rejectionReason = $rejectionReason;
    }

    public function build()
    {
        return $this->view('emails.complaint-rejected')
                    ->with([
                        'complaint' => $this->complaint,
                        'rejectionReason' => $this->rejectionReason,
                    ]);
    }
}
