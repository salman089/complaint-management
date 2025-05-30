<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmployeeCreated;
use App\Mail\EmployeeDeleted;
use App\Mail\EmployeeUpdated;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = User::where('role', 'employee')->orderBy('name')->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        $employees = User::where('role', 'employee')
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:5000'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $employee = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'position' => $data['position'],
            'role' => 'employee',
        ]);

        Mail::to($employee->email)->send(new EmployeeCreated($employee));

        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:5000'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $employee = User::findOrFail($id);
        $employee->update($data);

        Mail::to($employee->email)->send(new EmployeeUpdated($employee));

        return redirect()->route('admin.employees.index')->with('update', 'Employee updated successfully.');
    }


    public function destroy($id)
    {
        $employee =User::where('id', $id)->where('role', 'employee')->firstOrFail();

        Mail::to($employee->email)->send(new EmployeeDeleted($employee));

        $employee->delete();

        return redirect()->route('admin.employees.index')->with('danger', 'Employee deleted successfully.');
    }
}
