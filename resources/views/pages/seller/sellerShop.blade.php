<x-app-layout title="Seller Shop">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="sellerShop">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="sellerShopPage">
            <div class="h-1"></div>
            <a href="{{ route('salesPage') }}" class="w-full md:w-max text-center border bg-white/10 text-white px-4 py-2 rounded-md shadow 
                hover:bg-white/20 transition cursor-pointer block">
                View Sales History
            </a>
            <div class="h-1"></div>
            @livewire('seller.shop-products')
        </div>
    </div>
</x-app-layout>