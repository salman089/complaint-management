<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\ComplaintAssignee;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('home');
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif ($user->hasRole('employee')) {
            return redirect()->route('employee.home');
        } elseif ($user->hasRole('customer')) {
            return redirect()->route('customer.home');
        }

        return redirect()->route('home');
    }


    public function customer()
    {
        $complaints = Complaint::where('user_id', auth()->user()->id)->get();

        $pending = Complaint::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $quoted = Complaint::where('user_id', auth()->user()->id)->where('status', 'quoted')->get();
        $accepted = Complaint::where('user_id', auth()->user()->id)->where('status', 'accepted')->get();
        $rejected = Complaint::where('user_id', auth()->user()->id)->where('status', 'rejected')->get();
        $assigned = Complaint::where('user_id', auth()->user()->id)->where('status', 'assigned')->get();
        $inprogress = Complaint::where('user_id', auth()->user()->id)->where('status', 'in progress')->get();
        $completed = Complaint::where('user_id', auth()->user()->id)->where('status', 'completed')->get();
        $closed = Complaint::where('user_id', auth()->user()->id)->where('status', 'closed')->get();

        return view('customer.dashboard', compact(
            'complaints',
            'pending',
            'quoted',
            'accepted',
            'rejected',
            'assigned',
            'inprogress',
            'completed',
            'closed',
        ));
    }

    public function employee()
    {
       $tasks = ComplaintAssignee::where('user_id', Auth::id())
            ->with('complaint')
            ->get();

       $assigned = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) {
                $query->where('status', 'assigned');
            })
            ->get();

        $inprogress = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) {
                $query->where('status', 'in progress');
            })
            ->get();

        $completed = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) {
                $query->where('status', 'completed');
            })
            ->get();

        $closed = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) {
                $query->where('status', 'closed');
            })
            ->get();

        return view('employee.dashboard', compact(
            'tasks',
            'assigned',
            'inprogress',
            'completed',
            'closed'
        ));
    }


    public function admin()
    {
        $complaints = Complaint::all();
        $employees = User::where('role', 'employee')->get();
        $users = User::where('role', 'customer')->get();
        $pending = Complaint::where('status', 'pending')->get();
        $quoted = Complaint::where('status', 'quoted')->get();
        $accepted = Complaint::where('status', 'accepted')->get();
        $rejected = Complaint::where('status', 'rejected')->get();
        $assigned = Complaint::where('status', 'assigned')->get();
        $inprogress = Complaint::where('status', 'in progress')->get();
        $completed = Complaint::where('status', 'completed')->get();
        $closed = Complaint::where('status', 'closed')->get();

        $acceptedComplaints = Complaint::where('status', 'accepted')->pluck('id')->toArray();
        $assignedComplaints = Complaint::where('status', 'assigned')->pluck('id')->toArray();
        $inprogessComplaints = Complaint::where('status', 'in progress')->pluck('id')->toArray();
        $completedComplaints = Complaint::where('status', 'completed')->pluck('id')->toArray();
        $closedComplaints = Complaint::where('status', 'closed')->pluck('id')->toArray();

        $mergedPending = array_merge($acceptedComplaints, $assignedComplaints, $inprogessComplaints, $completedComplaints);

        $paidAmount = Quotation::whereIn('complaint_id', $closedComplaints)->sum('price');

        $pendingAmount = Quotation::whereIn('complaint_id', $mergedPending)->sum('price');

        $totalAmount = $paidAmount + $pendingAmount;


        return view('admin.dashboard', compact(
            'complaints',
            'employees',
            'users',
            'pending',
            'quoted',
            'accepted',
            'rejected',
            'assigned',
            'inprogress',
            'completed',
            'closed',
            'paidAmount',
            'pendingAmount',
            'totalAmount',
        ));
    }
}
