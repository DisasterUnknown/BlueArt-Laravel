<div class="p-4">
    @if($requests->isEmpty())
        <div class="flex items-center justify-center min-h-[calc(100vh-92px)]">
            <p class="text-3xl text-center text-gray-500 font-bold">No pending unban user requests.</p>
        </div>
    @else
        <p class="text-2xl font-bold text-center mt-8 mb-10">Unban User Requests</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($requests as $request)
                <div class="border-2 border-red-500 rounded-2xl shadow-md p-4 bg-gray-800/20 flex flex-col justify-between">

                    {{-- User Info --}}
                    <div>
                        <h3 class="text-lg font-bold">{{ $request->email }}</h3>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            <span class="font-semibold">Reason:</span> {{ $request->message }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-between mt-4">
                        <button wire:click="restore({{ $request->id }})"
                            class="border-2 border-green-500/30 bg-green-500/30 text-white px-4 py-2 rounded-xl hover:bg-green-600 transition">
                            Restore
                        </button>

                        <button wire:click="dismiss({{ $request->id }})"
                            class="border-2 border-red-500/30 bg-red-500/30 text-white px-4 py-2 rounded-xl hover:bg-red-600 transition">
                            Dismiss
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
