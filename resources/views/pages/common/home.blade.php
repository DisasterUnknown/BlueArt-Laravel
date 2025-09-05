<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home Page') }}
        </h2>
    </x-slot>

    {{-- Add your custom page scripts --}}
    @push('scripts')
    <script src="{{ asset('JavaScript/index.js') }}"></script>
    <script src="{{ asset('JavaScript/home.js') }}"></script>
    @endpush

    <div class="space-y-4 min-h-[calc(100vh-92px)]" id="homePage">
        <livewire:common.home-page-categories />
    </div>
</x-app-layout>