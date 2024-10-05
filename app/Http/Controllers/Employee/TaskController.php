<?php

namespace App\Http\Controllers\Employee;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Mail\ComplaintStatus;
use App\Models\CompletionImage;
use App\Mail\ComplaintCompleted;
use App\Models\ComplaintAssignee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'assigned');

        $tasks = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->paginate(10);

        return view('employee.tasks.index', compact('status', 'tasks'));
    }

    public function search(Request $request)
    {
        $status = $request->query('status', 'assigned');

        $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        $tasks = ComplaintAssignee::where('user_id', Auth::id())
            ->whereHas('complaint', function ($query) use ($status, $request) {
                $query->where('status', $status)
                    ->where(function ($query) use ($request) {
                        $query->where('complaint', 'like', '%' . $request->search . '%')
                            ->orWhere('phone', 'like', '%' . $request->search . '%')
                            ->orWhere('street_address', 'like', '%' . $request->search . '%')
                            ->orWhere('city', 'like', '%' . $request->search . '%')
                            ->orWhere('region', 'like', '%' . $request->search . '%')
                            ->orWhere('postal_code', 'like', '%' . $request->search . '%');
                    });
            })
            ->paginate(10);

        return view('employee.tasks.index', compact('status', 'tasks'));
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

        Mail::to($task->user->email)->send(new ComplaintStatus($task, 'in progress'));


        return redirect()->route('employee.tasks.index', ['status' => 'in progress'])->with('success', 'Task has been started.');
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
            'completion_image' => ['nullable', 'array'],
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
        Mail::to($complaint->user->email)->send(new ComplaintCompleted($complaint, 'completed'));

        return redirect()->route('employee.tasks.index', ['status' => 'completed'])->with('success', 'Task completed successfully.');
    }
}
