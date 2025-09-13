<?php

namespace App\Http\Controllers\PageControllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\BaseControllers\ProductController;

class RequestUnbanProductController extends Controller
{
    public function index($productId = null)
    {
        $product = Product::findOrFail($productId);
        return view('pages.seller.requestUnbanProductPage', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $controller = new ProductController();
        return $controller->requestUnban($request);
    }
}
