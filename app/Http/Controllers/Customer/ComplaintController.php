<?php

namespace App\Http\Controllers\Customer;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Mail\ComplaintStatus;
use App\Mail\ComplaintCreated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    public function index()
    {
        $status = request('status', 'pending');

        $complaints = Complaint::where('status', $status)
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('customer.complaints.index', compact('status', 'complaints'));
    }

    public function search(Request $request)
    {
        $status = $request->query('status', 'pending');

        $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        $complaints = Complaint::where('user_id', auth()->id())
            ->where('status', $status)
            ->where(function ($query) use ($request) {
                $query->where('complaint', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('street_address', 'like', '%' . $request->search . '%')
                    ->orWhere('city', 'like', '%' . $request->search . '%')
                    ->orWhere('region', 'like', '%' . $request->search . '%')
                    ->orWhere('postal_code', 'like', '%' . $request->search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('customer.complaints.index', compact('status', 'complaints'));
    }


    public function create()
    {
        return view('customer.complaints.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'complaint' => ['required'],
            'files' => ['nullable', 'array'],
            'files.*' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            'phone' => ['required'],
            'street_address' => ['required'],
            'city' => ['required'],
            'region' => ['required'],
            'postal_code' => ['required'],
        ]);

        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'complaint' => $data['complaint'],
            'phone' => $data['phone'],
            'street_address' => $data['street_address'],
            'city' => $data['city'],
            'region' => $data['region'],
            'postal_code' => $data['postal_code'],
        ]);

        foreach ($data['files'] ?? [] as $file) {
            $path = $file->store('complaints', 'public');
            $complaint->photos()->create(['file_path' => $path]);
        }

        Mail::to(auth()->user()->email)->send(new ComplaintCreated($complaint));

        return redirect()->route('customer.complaints.index', ['status' => 'pending'])->with('success', 'Complaint submitted successfully.');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('customer.complaints.show', compact('complaint'));
    }

    public function accept($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => 'accepted']);

        Mail::to($complaint->user->email)->send(new ComplaintStatus($complaint, 'accepted'));

        return redirect()->route('customer.complaints.index', ['status' => 'accepted'])->with('success', 'Complaint accepted successfully.');
    }

    public function reject($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => 'rejected']);

        Mail::to($complaint->user->email)->send(new ComplaintStatus($complaint, 'rejected'));

        return redirect()->route('customer.complaints.index', ['status' => 'rejected'])->with('danger', 'Complaint rejected successfully.');
    }
}
