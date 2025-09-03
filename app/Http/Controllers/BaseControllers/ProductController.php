<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public static function store(Request $request)
    {
        dump($request->all());
        // $validated = $request->validate([
        //     'sellerID' => 'required|string|max:10',
        //     'name' => 'required|string|max:25',
        //     'price' => 'required|numeric',
        //     'discount' => 'numeric|max:99.9',
        //     'category' => 'required|string',
        //     'description' => 'string|max:1000',
        //     'mainImageBase64' => 'required|string',
        //     'image1Base64' => 'nullable|string',
        //     'image2Base64' => 'nullable|string',
        //     'image3Base64' => 'nullable|string',
        //     'image4Base64' => 'nullable|string',
        // ]);

        // Getting the last product ID
        $lastID = DB::table('id_counter')
            ->where('TableName', 'product')
            ->value('LastID');

        $nextID = str_pad($lastID + 1, 10, '0', STR_PAD_LEFT);

        // Updating the id table
        DB::table('id_counter')
            ->where('TableName', 'product')
            ->update(['LastID' => $lastID + 1]);

        // Product::create($validated);
        // return redirect()->route('products.index')->with('success','Product added');
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
