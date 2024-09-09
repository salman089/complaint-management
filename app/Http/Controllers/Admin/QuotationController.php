<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{

    public function create($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.quote', compact('complaint'));
    }

    public function store(Request $request, $complaint_id)
    {
        $data = $request->validate([
            'price' => ['required', 'numeric', 'min:1', 'max:1000000000'],
            'quotation_details' => ['required', 'string', 'max:256'],
            'additional_notes' => ['nullable', 'string', 'max:256'],
        ]);

        $complaint = Complaint::findOrFail($complaint_id);

        Quotation::create([
            'complaint_id' => $complaint->id,
            'customer_id' => $complaint->user_id,
            'price' => $data['price'],
            'quotation_details' => $data['quotation_details'],
            'additional_notes' => $data['additional_notes'] ?? null,
        ]);

        $complaint->update(['status' => 'quoted']);

        // Mail::to($complaint->user->email)->send(new QuotationSent($quotation, $data['price'], $data['quotation_details'], $data['additional_notes'] ?? null));

        return redirect()->route('admin.complaints.index', ['status' => 'quoted'])->with('quote', 'Quotation sent successfully.');
    }

}
