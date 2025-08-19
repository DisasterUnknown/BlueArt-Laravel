<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product','customer')->get();
        return view('sale.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.create', compact('products','customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProductID' => 'nullable|string|max:10',
            'CustomerID' => 'nullable|string|max:10',
            'SalesDateTime' => 'nullable|date',
            'Amount' => 'nullable|numeric',
            'PhoneNumber' => 'nullable|string|max:15',
            'Address' => 'nullable|string',
            'ShippingMethod' => 'nullable|string|max:50'
        ]);

        Sale::create($validated);
        return redirect()->route('sales.index')->with('success','Sale added');
    }

    public function show($id)
    {
        $sale = Sale::with('product','customer')->findOrFail($id);
        return view('sale.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('sale.edit', compact('sale','products','customers'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $validated = $request->validate([
            'ProductID' => 'nullable|string|max:10',
            'CustomerID' => 'nullable|string|max:10',
            'SalesDateTime' => 'nullable|date',
            'Amount' => 'nullable|numeric',
            'PhoneNumber' => 'nullable|string|max:15',
            'Address' => 'nullable|string',
            'ShippingMethod' => 'nullable|string|max:50'
        ]);
        $sale->update($validated);
        return redirect()->route('sales.index')->with('success','Sale updated');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('success','Sale deleted');
    }
}
