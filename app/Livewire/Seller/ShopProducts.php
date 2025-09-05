<?php

namespace App\Livewire\Seller;

use Livewire\Component;
use App\Models\Product;

class ShopProducts extends Component
{
    public $products;

    public function mount()
    {
        // Load products with relationships
        $this->products = Product::with('seller', 'images', 'sales')->where('status', '!=',  'deleted')->get();
    }

    public function render()
    {
        return view('livewire.seller.shop-products');
    }

    public function removeProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update(['status' => 'deleted']);
        }

        // Refresh products
        $this->products = Product::with('seller', 'images', 'sales')->where('status', '!=',  'deleted')->get();
    }
}
