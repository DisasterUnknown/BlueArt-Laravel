<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="page404">
        <div id="noProductCartId" class="flex items-center justify-center min-h-[calc(100vh-92px)]">
            <p class="text-6xl text-center font-bold">403 <br> Error: Unauthorized</p>
        </div>
    </div>
</x-app-layout>