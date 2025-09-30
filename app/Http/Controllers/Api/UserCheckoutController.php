<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sale;

class UserCheckoutController extends Controller
{
    /**
     * Process user checkout with client-sent cart.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to complete checkout.'
            ], 401);
        }

        // Remove spaces from card info
        $request->merge([
            'cardNumber' => str_replace(' ', '', $request->cardNumber ?? ''),
            'CVC' => str_replace(' ', '', $request->CVC ?? ''),
        ]);

        // Validate general input
        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'required|string|max:15',
            'address' => 'required|string',
            'shippingMethod' => 'required|string|max:50',
            'cardHolderName' => 'required|string|max:100',
            'cardNumber' => 'required|numeric|digits_between:12,19',
            'CVC' => 'required|numeric|digits_between:3,4',
            'cart' => 'required|array|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $cartItems = $request->input('cart');
        if (!is_array($cartItems) || empty($cartItems)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty or invalid format.'
            ], 400);
        }

        $salesCreated = [];
        foreach ($cartItems as $item) {
            if (!isset($item['product']) || !isset($item['quantity'])) {
                continue; 
            }

            $product = Product::find($item['product']);
            if (!$product) continue;

            $quantity = (int) $item['quantity'];
            $price = $product->price - (($product->price / 100) * $product->discount);
            $amount = $price * $quantity;

            try {
                $sale = Sale::create([
                    'product_id' => $product->id,
                    'customerID' => (string) $userId,
                    'salesDateTime' => now(),
                    'amount' => $amount,
                    'phoneNumber' => $request->phoneNumber,
                    'address' => $request->address,
                    'shippingMethod' => $request->shippingMethod,
                ]);
                $salesCreated[] = $sale;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sale insert failed for product ID ' . $product->id,
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Purchase completed successfully!',
            'sales' => $salesCreated
        ], 200);
    }
}
