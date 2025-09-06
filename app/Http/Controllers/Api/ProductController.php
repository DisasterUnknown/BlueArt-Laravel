<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::with('images', 'seller')->where('status', 'active')->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    // Show single product
    public function show($limit)
    {
        $product = Product::with('images', 'seller', 'sales.customer')
            ->where('status', 'active')->take($limit)
            ->get();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }
}
