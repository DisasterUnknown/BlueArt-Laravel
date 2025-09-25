<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mongo\UserCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Get the authenticated user's cart
    public function getUserCart(Request $request)
    {
        $userId = $request->user()->id;
        $cart = UserCart::firstOrCreate(
            ['user_id' => $userId],
            ['product_id' => []]
        );

        return response()->json([
            'success' => true,
            'data' => $cart,
        ]);
    }

    // Add a product to the authenticated user's cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string',
            'quantity'   => 'required|integer|min:1',
        ]);

        $userId    = $request->user()->id;
        $productId = $request->input('product_id');
        $quantity  = $request->input('quantity');

        $cart = UserCart::firstOrCreate(
            ['user_id' => $userId],
            ['product_id' => []]
        );

        $products = $cart->product_id ?? [];
        $found = false;

        foreach ($products as &$item) {
            if ($item['id'] === $productId) {
                $item['quantity'] = $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $products[] = ['id' => $productId, 'quantity' => $quantity];
        }

        $cart->product_id = $products;
        $cart->save();

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'data' => $cart,
        ]);
    }

    // Remove a product from the authenticated user's cart
    public function removeItem(Request $request, $productId)
    {
        $userId = $request->user()->id;
        $cart = UserCart::where('user_id', $userId)->first();

        if (!$cart) {
            return response()->json([
                'success' => false,
                'message' => 'Cart not found',
            ], 404);
        }

        $cart->pull('product_id', ['id' => $productId]);
        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart',
            'data' => $cart,
        ]);
    }

    // Clear the authenticated user's cart
    public function clearCart(Request $request)
    {
        $userId = $request->user()->id;
        $cart = UserCart::firstOrCreate(
            ['user_id' => $userId],
            ['product_id' => []]
        );

        $cart->product_id = [];
        $cart->save();

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared',
            'data' => $cart,
        ]);
    }
}
