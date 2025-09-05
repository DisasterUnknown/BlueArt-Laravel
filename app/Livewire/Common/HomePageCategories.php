<?php

namespace App\Livewire\Common;

use Livewire\Component;
use App\Models\Product;

class HomePageCategories extends Component
{
    public $artProducts;
    public $collectiblesProducts;

    public function mount()
    {
        // Fetch 4 active art products with their images
        $this->artProducts = Product::with(['images' => function ($q) {
                $q->where('level', 'main');
            }])
            ->where('status', 'active')
            ->where('category', 'art')
            ->latest()
            ->take(3)
            ->get();

        // Fetch 4 active collectibles with their images
        $this->collectiblesProducts = Product::with(['images' => function ($q) {
                $q->where('level', 'main');
            }])
            ->where('status', 'active')
            ->where('category', 'collectibles')
            ->latest()
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.common.home-page-categories');
    }

    public function viewProduct($id)
    {
        return redirect()->route('viewProductDetails', ['id' => $id]);
    }
}
