<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('user')->get();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|string|max:10',
            'NIC' => 'nullable|string|max:20'
        ]);

        Admin::create($validated);
        return redirect()->route('admins.index')->with('success','Admin added');
    }

    public function show($id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $users = User::all();
        return view('admin.edit', compact('admin', 'users'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'nullable|string|max:10',
            'NIC' => 'nullable|string|max:20'
        ]);
        $admin->update($validated);
        return redirect()->route('admins.index')->with('success','Admin updated');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index')->with('success','Admin deleted');
    }
}
