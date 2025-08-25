<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seller','images','sales')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $sellers = Seller::all();
        return view('product.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sellerID' => 'nullable|string|max:10',
            'productName' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category' => 'required|in:art,collectibles',
            'status' => 'required|in:active,banned,userkick'
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success','Product added');
    }

    public function show($id)
    {
        $product = Product::with('seller','images','sales')->findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $sellers = Seller::all();
        return view('product.edit', compact('product','sellers'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'sellerID' => 'string|max:10',
            'productName' => 'string|max:100',
            'price' => 'numeric',
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category' => 'required|in:art,collectibles',
            'status' => 'required|in:active,banned,userkick'
        ]);
        $product->update($validated);
        return redirect()->route('products.index')->with('success','Product updated');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted');
    }
}
