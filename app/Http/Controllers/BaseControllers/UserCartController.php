<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Controllers\Controller;
use App\Models\Mongo\UserCart;

class UserCartController extends Controller
{
    // Add a product with quantity
    public function addToCart($userId, $productId, $quantity = 1)
    {
        $cart = UserCart::firstOrCreate(
            ['user_id' => $userId],
            ['product_id' => []] // initempty array
        );

        $found = false;

        // Check if product already exists
        foreach ($cart->product_id as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity; // increment quantity
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart->push('product_id', ['id' => $productId, 'quantity' => $quantity]);
        } else {
            $cart->save();
        }

        return $cart;
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
