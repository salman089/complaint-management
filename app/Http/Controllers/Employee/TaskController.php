<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Models\ComplaintAssignee;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
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

    public function start($id)
    {
        $task = Complaint::findOrFail($id);
        $task->status = 'in progress';
        $task->save();

        return redirect()->route('employee.tasks.index', $id)->with('success', 'Task has been started.');
    }

    public function showCompleteForm($id)
    {
        $task = Complaint::findOrFail($id);
        return view('employee.tasks.complete', compact('task'));
    }

    public function completeTask(Request $request, $id)
    {
        $data = $request->validate([
            'completion_note' => ['required', 'string', 'max:256'],
            'completion_image.*' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $complaint = Complaint::findOrFail($id);

        $complaint->status = 'completed';
        $complaint->completion_note = $data['completion_note'];
        $complaint->completed_date = now();

        if ($request->hasFile('completion_image')) {
            $images = [];
            foreach ($request->file('completion_image') as $file) {
                $imagePath = $file->store('complaint_images', 'public');
                $images[] = $imagePath;
            }
            $complaint->completion_image = json_encode($images);
        }

        $complaint->save();

        return redirect()->route('employee.tasks.index')->with('success', 'Task completed successfully.');
    }
}
