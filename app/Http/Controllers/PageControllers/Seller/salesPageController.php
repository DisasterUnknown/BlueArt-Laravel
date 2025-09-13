<?php

namespace App\Http\Controllers\PageControllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sale;

class SalesPageController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Get all seller products 
        $productIds = Product::where('user_id', $userId)->pluck('id');

        // Get all sales 
        $sales = Sale::with('product')
            ->whereIn('product_id', $productIds)
            ->orderBy('salesDateTime', 'desc')
            ->get();

        return view('pages.seller.productSales', compact('sales'));
    }
}
