<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('/assets/LoginBackground.gif')" x-data="{ role: 'customer' }">

        <!-- Navigation Bar -->
        <div class="flex justify-between absolute top-0 left-0 w-full">
            <a href="{{ url('/home') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mt-2 ml-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">BlueArt</a>
            <div class="mt-2">
                <a href="{{ url('/login') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">Login</a>
                <a href="{{ url('/aboutUs') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">About Us</a>
            </div>
        </div>

        <!-- forgot password Form -->
        <div class="flex items-center justify-center min-h-screen">


            @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('password.email') }}" class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[400px] shadow-lg rounded">
                @csrf

                <div class="mb-4 text-sm text-gray-800 dark:text-gray-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                @if ($errors->any())
                <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 mb-5 px-4 py-3 rounded">
                    @foreach ($errors->all() as $error)
                    <p class="text-white text-center mb-1">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <!-- Email -->
                <div class="flex flex-col justify-center mb-2">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
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
