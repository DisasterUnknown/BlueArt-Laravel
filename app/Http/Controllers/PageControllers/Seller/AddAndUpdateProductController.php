<?php

namespace App\Http\Controllers\PageControllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseControllers\ProductController;

class AddAndUpdateProductController extends Controller
{
    public function index(Product $product = null)
    {
        if ($product) {
            // Pass product data for Alpine.js to prefill
            $images = $product->images->map(function ($img, $index) {
                return [
                    'Level' => $index === 0 ? 'main' : 'sub',
                    'Content' => $img->content,
                ];
            });

            return view('pages.seller.addProductPage', [
                'product' => $product,
                'images' => $images,
                'mode' => 'edit'
            ]);
        }

        return view('pages.seller.addProductPage', ['mode' => 'add']);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Merge user_id into the request
        $request->merge(['user_id' => $userId]);

        // Checling for validity
        if ($request->mainImageBase64 == null) {
            return redirect()->back()->with('error', 'Main image is required')->withInput();
        } else if ($request->name == null) {
            return redirect()->back()->with('error', 'Product name is required')->withInput();
        } else if ($request->price == null) {
            return redirect()->back()->with('error', 'Product price is required')->withInput();
        } else if ($request->category == null) {
            return redirect()->back()->with('error', 'Product category is required')->withInput();
        } else if ($request->description == null) {
            return redirect()->back()->with('error', 'Product description is required')->withInput();
        } else if ($request->discount == null) {
            return redirect()->back()->with('error', 'Product discount is required')->withInput();
        } else {
            $controller = new ProductController();
            switch ($request->mode) {
                case 'edit':
                    return $controller->update($request);
                case 'add':
                    return $controller->store($request);
                default:
                    break;
            }
        }
    }
}
