<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\CustomerDeleted;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

        $customer = User::where('id', $id)->where('role', 'customer')->firstOrFail();

        $customer->complaints()->update(['status' => 'archived']);

        Mail::to($customer->email)->send(new CustomerDeleted($customer));

        $customer->delete();

        $restoredCustomer = User::withTrashed()->find($id);
        if ($restoredCustomer) {
            $restoredCustomer->email = 'deleted' . $restoredCustomer->id . '@example.com';
            $restoredCustomer->save();
        }

        return redirect()->route('admin.customers.index')->with('danger', 'Customer deleted successfully.');
    }
}
