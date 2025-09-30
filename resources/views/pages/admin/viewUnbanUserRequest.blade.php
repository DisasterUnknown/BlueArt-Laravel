<x-app-layout title="View Unban User Request">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="viewUsers">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewUsersPage">
            @livewire('admin.view-unban-user-request')
        </div>
    </div>
</x-app-layout>