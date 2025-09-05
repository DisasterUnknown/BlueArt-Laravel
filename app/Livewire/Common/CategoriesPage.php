<?php

namespace App\Livewire\Common;

use Livewire\Component;
use App\Models\Product;

class CategoriesPage extends Component
{
    public $productsList;

    public function mount($category)
    {
        // Fetch products with their images
        $this->productsList = Product::with(['images' => function ($q) {
                $q->where('level', 'main');
            }])
            ->where('status', 'active')
            ->where('category', $category)
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.common.categories-page');
    }

    public function viewProduct($id)
    {
        return redirect()->route('viewProductDetails', ['id' => $id]);
    }
}
