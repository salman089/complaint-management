<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->orderBy('name')->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        $customers = User::where('role', 'customer')
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function destroy($id)
    {
        $customer =User::where('id', $id)->where('role', 'customer')->firstOrFail();

        $customer->delete();

        return redirect()->route('admin.customers.index')->with('danger', 'Customer deleted successfully.');
    }

}
