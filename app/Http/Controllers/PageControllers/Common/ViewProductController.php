<?php

namespace App\Http\Controllers\PageControllers\Common;

use App\Http\Controllers\BaseControllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Controllers\BaseControllers\UserCartController;

class ViewProductController extends Controller
{
    public function index($id)
    {
        $product = Product::with('seller', 'images', 'sales')->findOrFail($id);
        $product->sales->load('customer');
        return view("pages/common/viewProductDetails", compact('product'));
    }

    public function productManagement(Request $request)
    {
        if ($request->has('action') && $request->action === 'ban') {
            $controller = new ProductController();
            return $controller->remove($request);
        } else {
            $controller = new UserCartController();
            return $controller->addToCart($request);
        }
    }
}
