<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view ('customer.dashboard');
    }

    public function employee()
    {
        return view ('employee.dashboard');
    }

    public function admin()
    {
        return view ('admin.dashboard');
    }

}
