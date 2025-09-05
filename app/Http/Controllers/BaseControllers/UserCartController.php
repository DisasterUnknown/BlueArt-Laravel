<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Mongo\UserCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    // Add a product with quantity
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity  = $request->input('quantity');

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to add products to the cart.')->withInput();
        }

        $userId = Auth::id();

        $cart = UserCart::firstOrCreate(
            ['user_id' => $userId],
            ['product_id' => []]
        );

        // Get current products array
        $products = $cart->product_id ?? [];
        $found = false;
        $newProducts = [];

        // Update quantity if product exists
        foreach ($products as $item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $quantity;
                $found = true;
            }
            $newProducts[] = $item;
        }

        if (!$found) {
            $newProducts[] = ['id' => $productId, 'quantity' => $quantity];
        }

        // Save back to MongoDB
        $cart->product_id = $newProducts;
        $cart->save();

        return redirect()->route('cart');
    }

    // Get the user's cart
    public function getCart($userId)
    {
        return UserCart::where('user_id', $userId)->first();
    }

    // Remove a product entirely
    public function removeItem($userId, $productId)
    {
        $cart = UserCart::where('user_id', $userId)->first();
        if ($cart) {
            $cart->pull('product_id', ['id' => $productId]);
        }
        return $cart;
    }

    // Update quantity of a product
    public function updateQuantity($userId, $productId, $quantity)
    {
        $cart = UserCart::where('user_id', $userId)->first();
        if ($cart) {
            foreach ($cart->product_id as &$item) {
                if ($item['id'] == $productId) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
            $cart->save();
        }
        return $cart;
    }

    // Clear cart
    public function clearCart($userId)
    {
        $cart = UserCart::where('user_id', $userId)->first();
        if ($cart) {
            $cart->product_id = [];
            $cart->save();
        }
        return $cart;
    }
}
