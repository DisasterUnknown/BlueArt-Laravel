<?php

namespace App\Livewire\Common;

use Livewire\Component;
use App\Models\Mongo\UserCart;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $productId;
    public $quantity = 1;
    public $message = '';

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            $this->message = 'You must be logged in to add products to the cart.';
            return;
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
            if ($item['id'] == $this->productId) {
                $item['quantity'] += $this->quantity;
                $found = true;
            }
            $newProducts[] = $item;
        }

        if (!$found) {
            $newProducts[] = ['id' => $this->productId, 'quantity' => $this->quantity];
        }

        // Save back to MongoDB
        $cart->product_id = $newProducts;
        $cart->save();

        $this->message = 'Product added to cart!';
    }

    public function render()
    {
        return view('livewire.common.add-to-cart');
    }
}
