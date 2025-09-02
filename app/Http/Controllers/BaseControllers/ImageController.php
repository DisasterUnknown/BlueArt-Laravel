<?php

namespace App\Http\Controllers\BaseControllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with('product')->get();
        return view('image.index', compact('images'));
    }

    public function create()
    {
        $products = Product::all();
        return view('image.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'productID' => 'nullable|string|max:10',
            'content' => 'nullable|string',
            'level' => 'required|in:main,sub'
        ]);

        Image::create($validated);
        return redirect()->route('images.index')->with('success','Image added');
    }

    public function show($id)
    {
        $image = Image::with('product')->findOrFail($id);
        return view('image.show', compact('image'));
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        $products = Product::all();
        return view('image.edit', compact('image','products'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $validated = $request->validate([
            'productID' => 'nullable|string|max:10',
            'content' => 'nullable|string',
            'level' => 'required|in:main,sub'
        ]);
        $image->update($validated);
        return redirect()->route('images.index')->with('success','Image updated');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return redirect()->route('images.index')->with('success','Image deleted');
    }
}
