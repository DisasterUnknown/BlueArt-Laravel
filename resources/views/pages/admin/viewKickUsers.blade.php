<x-app-layout title="View Kicked Users">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="viewKickUsers">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewKickUsersPage">
            <div class="h-1"></div>
            <a href="{{ route('viewUnbanRequest') }}" class="w-full md:w-max text-center border bg-white/10 text-white px-4 py-2 rounded-md shadow 
                hover:bg-white/20 transition cursor-pointer block">
                View Unban Request
            </a>
            <div class="h-1"></div>
            <p class="text-2xl font-bold text-center mt-8 mb-10">View Kicked Users</p>
            @livewire('admin.view-kick-users')
        </div>
    </div>
</x-app-layout>