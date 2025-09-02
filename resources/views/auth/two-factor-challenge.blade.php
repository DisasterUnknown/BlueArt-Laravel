<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('/assets/LoginBackground.gif')" x-data="{ role: 'customer' }">

        <!-- Navigation Bar -->
        <div class="flex justify-between absolute top-0 left-0 w-full">
            <a href=""></a>
            <div class="mt-2">
                <a href="{{ url('/login') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">Login</a>
                <a href="{{ url('/aboutUs') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">About Us</a>
            </div>
        </div>

        <!-- forgot password Form -->
        <div class="flex items-center justify-center min-h-screen" x-data="{ recovery: false }">


            @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('two-factor.login') }}" class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[400px] shadow-lg rounded">
                @csrf

                <div class="mb-4 text-sm text-gray-800 dark:text-gray-400" x-show="! recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>
                <div class="mb-4 text-sm text-gray-800 dark:text-gray-400" x-cloak x-show="recovery">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

                <div class="flex flex-col justify-center mb-2" x-show="! recovery">
                    <x-label for="code" value="{{ __('Code') }}" />
                    <input id="code" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <div class="flex flex-col justify-center mb-2" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <input id="recovery_code" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                @if ($errors->any())
                <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 px-4 py-3 rounded">
                    @foreach ($errors->all() as $error)
                    <p class="text-white text-center mb-1">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                        x-show="! recovery"
                        x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                        x-cloak
                        x-show="recovery"
                        x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

        </div>

        <!-- Footer -->
        <footer class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
            <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
        </footer>
    </div>
</x-guest-layout>