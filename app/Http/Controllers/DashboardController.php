<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
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
        $closed = Complaint::where('user_id', auth()->user()->id)->where('status', 'closed')->get();
        $assigned = Complaint::where('user_id', auth()->user()->id)->where('status', 'assigned')->get();
        $completed = Complaint::where('user_id', auth()->user()->id)->where('status', 'completed')->get();

        return view('customer.dashboard', compact(
            'complaints',
            'pending',
            'quoted',
            'accepted',
            'rejected',
            'closed',
            'assigned',
            'completed'
        ));
    }

    public function employee()
    {
        return view('employee.dashboard');
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
        $closed = Complaint::where('status', 'closed')->get();
        $assigned = Complaint::where('status', 'assigned')->get();
        $completed = Complaint::where('status', 'completed')->get();
        $total = Complaint::where('status', 'closed')->sum('price');


        return view('admin.dashboard', compact(
            'complaints',
            'employees',
            'users',
            'pending',
            'quoted',
            'accepted',
            'rejected',
            'closed',
            'assigned',
            'completed',
            'total'
        ));
    }
}
