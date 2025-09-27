<x-app-layout title="My Cart">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Cart
        </h2>
    </x-slot>

    <div class="space-y-4">
            <div class="h-1"></div>
            <a href="{{ route('transactionHistoryPage') }}" class="w-full md:w-max text-center border bg-white/10 text-white px-4 py-2 rounded-md shadow 
                hover:bg-white/20 transition cursor-pointer block">
                View Transaction History
            </a>
            <div class="h-1"></div>
        <livewire:common.cart-page />
    </div>
</x-app-layout>
