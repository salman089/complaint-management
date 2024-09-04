<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'pending');

        $complaints = Complaint::where('status', $status)->latest()->paginate(25);

        return view('admin.complaints.index', compact('complaints', 'status'));
    }

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function sendQuotationEmail($complaintId)
    {
        $quotation = Quotation::where('complaint_id', $complaintId)->firstOrFail();
        return view('emails.quotation-sent', compact('quotation'));
    }

    public function rejectionForm($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.reject', compact('complaint'));
    }

    public function rejectComplaint(Request $request, $id)
    {
        $data = $request->validate(['reason' => ['required', 'string', 'max:256']]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => 'rejected', 'reason' => $data['reason']]);

        // Mail::to($complaint->user->email)->send(new ComplaintRejected($complaint, $data['reason']));

        return redirect()->route('admin.complaints.index', ['status' => 'rejected'])->with('danger', 'Complaint rejected successfully.');
    }


}
