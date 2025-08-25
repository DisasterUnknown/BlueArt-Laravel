<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('/assets/LoginBackground.gif')">
        <!-- Top Nav Bar -->
        <div class="flex justify-between absolute top-0 left-0 w-full">
            <a href="{{ url('/home') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mt-2 ml-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">
                BlueArt
            </a>
            <a href="{{ url('/aboutUs') }}" class="border bg-white bg-opacity-5 backdrop-blur-lg mt-2 mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">
                About Us
            </a>
        </div>

        <!-- Login Form -->
        <div class="flex items-center justify-center min-h-screen">
            <form method="POST" action="{{ route('login') }}" class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[350px] shadow-lg rounded">
                @csrf

                <h1 class="text-3xl text-white text-center font-bold mb-7">Login</h1>

                <div class="flex flex-col justify-center mb-2">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <input id="email" class="border border-white bg-white text-white bg-opacity-5 px-3 mt-1 py-0.5 w-full rounded-full hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-pink-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="flex flex-col justify-center mb-2">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <input id="password" class="border border-white bg-white text-white bg-opacity-5 px-3 mt-1 py-0.5 w-full rounded-full hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-pink-400" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between mt-2 mb-4">
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-500">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-pink-200 hover:text-white underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                </div>

                @if ($errors->any())
                <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 mb-5 px-4 py-3 rounded">
                    @foreach ($errors->all() as $error)
                    <p class="text-white text-center mb-1">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <button type="submit"
                    class="bg-white text-center px-4 py-1 block mx-auto w-full rounded-full font-bold text-black hover:bg-white hover:bg-opacity-70">
                    {{ __('Log in') }}
                </button>

                <!-- Register -->
                @if (Route::has('register'))
                <p class="text-center text-sm text-white mt-2 mb-0.5 opacity-80">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="font-semibold hover:font-bold">Register</a>
                </p>
                @endif

                <hr class="my-5">

                <!-- Google Sign-in -->
                <a href="#"
                    class="bg-white px-4 py-1 block text-black text-center mx-auto w-full rounded-full font-bold hover:bg-white hover:bg-opacity-70">
                    Sign in with Google
                </a>
            </form>
        </div>

        <!-- Footer -->
        <footer class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
            <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
        </footer>
    </div>
</x-guest-layout>