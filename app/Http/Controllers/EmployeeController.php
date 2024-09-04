<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function tasks()
    {
        $tasks = Employee::where('user_id', Auth::id())->get();
        return view('employee.tasks', compact('tasks'));
    }
}

