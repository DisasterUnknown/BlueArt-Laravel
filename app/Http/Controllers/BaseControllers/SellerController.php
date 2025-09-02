<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with('user','products')->get();
        return view('seller.index', compact('sellers'));
    }

    public function create()
    {
        $users = User::all();
        return view('seller.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'userID' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20'
        ]);

        Seller::create($validated);
        return redirect()->route('sellers.index')->with('success','Seller added');
    }

    public function show($id)
    {
        $seller = Seller::with('user','products')->findOrFail($id);
        return view('seller.show', compact('seller'));
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        $users = User::all();
        return view('seller.edit', compact('seller','users'));
    }

    public function update(Request $request, $id)
    {
        $seller = Seller::findOrFail($id);
        $validated = $request->validate([
            'userID' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20'
        ]);
        $seller->update($validated);
        return redirect()->route('sellers.index')->with('success','Seller updated');
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return redirect()->route('sellers.index')->with('success','Seller deleted');
    }
}
