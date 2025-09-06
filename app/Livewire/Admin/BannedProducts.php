<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class BannedProducts extends Component
{
    public $bannedProducts;

    public function mount()
    {
        $this->bannedProducts = Product::with(['images' => function ($q) {
            $q->where('level', 'main'); }])
            ->where('status', 'banned')
            ->latest()
            ->take(3)
            ->get();
    }

    public function unbanProducts($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update(['status' => 'active']);
        }

        // Refresh products
        $this->bannedProducts = Product::with('seller', 'images', 'sales')->where('status', '==',  'banned')->get();
    }

    public function render()
    {
        return view('livewire.admin.banned-products');
    }
}
