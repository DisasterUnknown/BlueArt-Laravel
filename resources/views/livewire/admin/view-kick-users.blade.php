<?php
use Carbon\Carbon;
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
    @foreach($kickedUsers as $index => $user)
    <div class="border border-blue-700 rounded-xl shadow-lg p-4 bg-gradient-to-b from-blue-900/60 via-blue-800/40 to-blue-900/20 text-white hover:shadow-xl transition-shadow duration-300">
        <!-- User Info -->
        <div class="flex items-center space-x-4 mb-4">
            <img src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . $user->name }}" 
                 alt="{{ $user->name }}" class="w-12 h-12 rounded-full border-2 border-white">
            <div>
                <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                <p class="text-blue-200 text-sm">{{ $user->email }}</p>
            </div>
        </div>

        <!-- Role, Status, Joined -->
        <div class="flex justify-between mb-2">
            <span class="font-medium text-blue-200">Role:</span>
            <span class="capitalize">{{ $user->role }}</span>
        </div>
        <div class="flex justify-between mb-2">
            <span class="font-medium text-blue-200">Status:</span>
            <span class="{{ $user->status === 'active' ? 'text-green-400 font-bold' : 'text-red-400 font-bold' }}">
                {{ ucfirst($user->status) }}
            </span>
        </div>
        <div class="flex justify-between mb-4">
            <span class="font-medium text-blue-200">Joined:</span>
            <span>{{ Carbon::parse($user->created_at)->format('d M Y') }}</span>
        </div>

        <!-- Kick Button -->
        <div class="text-center">
            <button wire:click="restoreUser({{ $user->id }})"
                    class="bg-blue-200 text-blue-900 font-semibold px-4 py-2 rounded-full hover:bg-green-400 transition-colors duration-300">
                Restore User
            </button>
        </div>
    </div>
    @endforeach
</div>
