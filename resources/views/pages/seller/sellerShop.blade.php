<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="sellerShop">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="sellerShopPage">
            @livewire('seller.shop-products')
        </div>
    </div>
</x-app-layout>