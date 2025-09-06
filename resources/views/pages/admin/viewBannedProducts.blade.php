<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="viewBannedProducts">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewBannedProducts">
            <p class="text-2xl font-bold text-center mt-8 mb-10">Banned Products</p>
            @livewire('admin.banned-products')
        </div>
    </div>
</x-app-layout>