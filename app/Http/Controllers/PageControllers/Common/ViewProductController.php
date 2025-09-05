<?php

namespace App\Http\Controllers\PageControllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ViewProductController extends Controller
{
    public function index($id)
    {
        $product = Product::with('seller', 'images', 'sales')->findOrFail($id);
        return view("pages/common/viewProductDetails", compact('product'));
    }
}
