<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // List all sales
    public function index()
    {
        $sales = Sale::with('product', 'customer')->get();

        return response()->json([
            'success' => true,
            'data' => $sales
        ]);
    }

    // Show single sale
    public function show($limit)
    {
        $sale = Sale::with('product', 'customer')->take($limit)->get();

        if (!$sale) {
            return response()->json([
                'success' => false,
                'message' => 'Sale not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $sale
        ]);
    }
}
