<?php

namespace App\Livewire\Common;

use Livewire\Component;
use App\Models\Mongo\UserCart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cartItems = [];
    public $total = 0;

    public function mount()
    {
        $this->cartItems = [];
        $this->total = 0;

        if (!Auth::check()) return;

        $userId = Auth::id();
        $cart = UserCart::where('user_id', $userId)->first();

        if (!$cart || empty($cart->product_id)) return;

        // Ensure $cart->product_id is an array
        $productsArray = $cart->product_id;
        if (is_string($productsArray)) {
            $productsArray = json_decode($productsArray, true) ?? [];
        }

        foreach ($productsArray as $item) {
            $product = Product::with('images')->find($item['id']);
            if ($product) {
                $quantity = $item['quantity'] ?? 1;
                $subtotal = ($product->price - (($product->price / 100) * $product->discount)) * $quantity;

                $this->cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ];

                $this->total += $subtotal;
            }
        }
    }

    public function removeItem($productId)
    {
        if (!Auth::check()) return;

        $userId = Auth::id();
        $cart = UserCart::where('user_id', $userId)->first();

        if ($cart) {
            $productsArray = $cart->product_id;

            // Decode if string
            if (is_string($productsArray)) {
                $productsArray = json_decode($productsArray, true) ?? [];
            }

            // Remove the product
            $productsArray = array_filter($productsArray, fn($item) => $item['id'] != $productId);

            // Save as array
            $cart->product_id = array_values($productsArray); // reindex array
            $cart->save();
        }

        $this->mount();
    }

    public function render()
    {
        return view('livewire.common.cart-page');
    }

    public function viewProduct($id)
    {
        return redirect()->route('viewProductDetails', ['id' => $id]);
    }
}
