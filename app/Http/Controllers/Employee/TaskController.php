<?php

namespace App\Http\Controllers\Employee;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\CompletionImage;
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
            'completion_image.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $complaint = Complaint::findOrFail($id);

        $complaint->status = 'completed';
        $complaint->completion_note = $data['completion_note'];
        $complaint->completed_date = now();
        $complaint->save();

        if ($request->hasFile('completion_image')) {
            foreach ($request->file('completion_image') as $file) {
                $path = $file->store('completion_images', 'public');
                CompletionImage::create([
                    'complaint_id' => $complaint->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('employee.tasks.index')->with('success', 'Task completed successfully.');
    }
}
