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

        <!-- Registration Form -->
        <div class="flex items-center justify-center min-h-screen">
            <form method="POST" action="{{ route('register') }}" class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[400px] shadow-lg rounded">
                @csrf

                <h1 class="text-3xl text-white text-center font-bold mb-7">Register</h1>

                <!-- Name -->
                <div class="flex flex-col justify-center mb-2">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <input id="name" type="text" name="name" :value="old('name')" placeholder="Username" required autofocus
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- Email -->
                <div class="flex flex-col justify-center mb-2">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- Password -->
                <div class="flex flex-col justify-center mb-2">
                    <x-label for="Password" value="{{ __('Password') }}" />
                    <input id="password" type="password" name="password" placeholder="Password" required
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">

                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col justify-center mb-2">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <hr class="my-5">

                <!-- Role -->
                <div class="flex justify-center mb-2 items-center">
                    <x-label for="role" value="{{ __('Role') }}" class="mr-3" />
                    <select id="role" name="role" x-model="role" class="border border-white bg-white text-white bg-opacity-5 px-2 py-0.5 w-full rounded-full hover:bg-opacity-10">
                        <option value="customer" class="text-black">Customer</option>
                        <option value="seller" class="text-black">Seller</option>
                    </select>
                </div>

                <!-- Contact (Seller only) -->
                <div class="flex flex-col justify-center mb-2" x-show="role === 'seller'" x-transition>
                    <x-label for="contact" value="{{ __('Contact') }}" />
                    <input id="contact" type="tel" name="contact" placeholder="Contact"
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10">
                </div>

                <!-- Address (Seller only) -->
                <div class="flex flex-col justify-center mb-2" x-show="role === 'seller'" x-transition>
                    <x-label for="address" value="{{ __('Address') }}" />
                    <input id="address" type="text" name="address" placeholder="Address"
                        class="border border-white/80 bg-white placeholder-white/50 text-white bg-opacity-5 mt-1 px-3 py-0.5 w-full rounded-full hover:bg-opacity-10">
                </div>

                @if ($errors->any())
                <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 px-4 py-3 rounded">
                    @foreach ($errors->all() as $error)
                    <p class="text-white text-center mb-1">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <button type="submit"
                    class="bg-white text-center px-4 py-1 mt-5 block mx-auto w-full rounded-full font-bold text-black hover:bg-white hover:bg-opacity-70">
                    {{ __('Register') }}
                </button>

                <!-- Login -->
                @if (Route::has('login'))
                <p class="text-center text-sm text-white mt-2 mb-0.5 opacity-80">
                    {{ __("Already registered?") }}
                    <a href="{{ route('login') }}" class="font-semibold hover:font-bold">Login</a>
                </p>
                @endif
            </form>
        </div>

        <!-- Footer -->
        <footer class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
            <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
        </footer>

    </div>
</x-guest-layout>