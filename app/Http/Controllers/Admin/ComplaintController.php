<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
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

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
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
        $complaint = Complaint::findOrFail($id);
        $data = $request->validate(['reason' => ['required', 'string', 'max:256']]);

        $complaint->update(['status' => 'rejected', 'reason' => $data['reason']]);

        // Mail::to($complaint->user->email)->send(new ComplaintRejected($complaint, $data['reason']));

        return redirect()->route('admin.complaints.index', ['status' => 'rejected'])->with('danger', 'Complaint rejected successfully.');
    }

    public function assignEmployeeForm($id)
    {
        $complaint = Complaint::findOrFail($id);
        $employees = Employee::all();
        return view('admin.complaints.assign-employee', compact('complaint', 'employees'));
    }

    public function assignEmployee(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $data = $request->validate([
            'employee_id' => ['required', 'exists:employees,id'],
            'additional_notes' => ['nullable', 'string', 'max:256'],
        ]);

        $complaint->update(['status' => 'assigned', 'employee_id' => $data['employee_id']]);

        return redirect()->route('admin.complaints.index', ['status' => 'assigned'])->with('success', 'Complaint assigned successfully.');
    }
}
