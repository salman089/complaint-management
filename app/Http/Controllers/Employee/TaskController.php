<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\ComplaintAssignee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = ComplaintAssignee::where('user_id', Auth::id())->get();
        return view('employee.tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = ComplaintAssignee::findOrFail($id);
        return view('employee.tasks.show', compact('task'));
    }
}
