<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('user','sales')->get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        $users = User::all();
        return view('customer.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'userID' => 'nullable|string|max:10'
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('success','Customer added');
    }

    public function show($id)
    {
        $customer = Customer::with('user','sales')->findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $users = User::all();
        return view('customer.edit', compact('customer','users'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $validated = $request->validate([
            'userID' => 'nullable|string|max:10'
        ]);
        $customer->update($validated);
        return redirect()->route('customers.index')->with('success','Customer updated');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Customer deleted');
    }
}
