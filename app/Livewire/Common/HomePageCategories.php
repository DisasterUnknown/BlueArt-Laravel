<?php

namespace App\Livewire\Common;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class HomePageCategories extends Component
{
    public $artProducts;
    public $collectiblesProducts;
    public $randomAnime = [];

    public function mount()
    {
        // Fetch 4 active art products with their images
        $this->artProducts = Product::with([
            'images' => function ($q) {
                $q->where('level', 'main');
            }
        ])
            ->where('status', 'active')
            ->where('category', 'art')
            ->latest()
            ->take(3)
            ->get();

        // Fetch 4 active collectibles with their images
        $this->collectiblesProducts = Product::with([
            'images' => function ($q) {
                $q->where('level', 'main');
            }
        ])
            ->where('status', 'active')
            ->where('category', 'collectibles')
            ->latest()
            ->take(3)
            ->get();

        // Fetch 10 random anime from Jikan API
        $animeList = [];
        while (count($animeList) < 10) {
            $response = Http::withoutVerifying()->get("https://api.jikan.moe/v4/random/anime");

            if ($response->successful()) {
                $anime = $response->json('data');

                // --- 🚫 Filtering Logic ---
                $rating = $anime['rating'] ?? '';
                $genres = collect($anime['genres'])->pluck('name')->toArray();
                $explicit = collect($anime['explicit_genres'])->pluck('name')->toArray();

                if (
                    str_contains(strtolower($rating), 'hentai') ||
                    str_contains(strtolower($rating), 'rx') ||     // "Rx - Hentai"
                    in_array('Hentai', $genres) ||
                    in_array('Erotica', $genres) ||
                    !empty($explicit)
                ) {
                    continue; // skip this anime
                }

                $animeList[] = $anime;
            }
        }
        $this->randomAnime = $animeList;
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
