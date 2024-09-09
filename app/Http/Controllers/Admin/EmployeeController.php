<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = User::where('role', 'employee')->orderBy('name')->paginate(25);
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

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'position' => $data['position'],
            'role' => 'employee',
        ]);

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'max:5000'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $employee = User::findOrFail($id);
        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('update', 'Employee updated successfully.');
    }


    public function destroy($id)
    {

        User::where('id', $id)->where('role', 'employee')->delete();

        return redirect()->route('admin.employees.index')->with('danger', 'Employee deleted successfully.');
    }


}
