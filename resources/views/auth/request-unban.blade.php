<x-guest-layout>
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('/assets/LoginBackground.gif')">
        <!-- Top Nav Bar -->
        <div class="flex justify-between absolute top-0 left-0 w-full">
            <a href=""></a>
            <div class="mt-2">
                <a href="{{ url('/login') }}"
                    class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">Login</a>
                <a href="{{ url('/aboutUs') }}"
                    class="border bg-white bg-opacity-5 backdrop-blur-lg mr-2 py-0.5 pb-1 px-3 text-white font-semibold rounded">About
                    Us</a>
            </div>
        </div>

        <!-- Banned Account Form -->
        <div class="flex items-center justify-center min-h-screen">
            <form method="POST" action="{{ route('requestUnban') }}"
                class="bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[85%] sm:w-[400px] shadow-lg rounded">
                @csrf

                <h1 class="text-3xl text-white text-center font-bold mb-5">Account Suspended</h1>
                <p class="text-center text-white mb-7 opacity-80">
                    Your account has been banned by the admins.<br>
                    Please contact us for more information.
                </p>

                <!-- Email -->
                <div class="flex flex-col justify-center mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                    <input id="email" type="email" name="email" required
                        class="border border-white bg-white text-white bg-opacity-5 px-3 mt-1 py-0.5 w-full rounded-full
                                  hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-pink-400 placeholder-pink-400" />
                </div>

                <!-- Message -->
                <div class="flex flex-col justify-center mb-4">
                    <x-label for="message" value="{{ __('Message') }}" class="text-white" />
                    <textarea id="message" name="message" required rows="4"
                        class="border border-white bg-white text-white bg-opacity-5 px-3 mt-1 py-0.5 w-full rounded-xl
                                     hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-pink-400 placeholder-pink-400"></textarea>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-3 mb-3 px-4 py-2 rounded">
                        @foreach ($errors->all() as $error)
                            <p class="text-white text-center mb-1">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 mb-5 px-4 py-3 rounded">
                        <p class="text-white text-center">{{ session('success') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100/20 border border-red-400/20 text-red-700 mt-5 mb-5 px-4 py-3 rounded">
                        <p class="text-white text-center">{{ session('error') }}</p>
                    </div>
                @endif

                <button type="submit" class="bg-white text-center px-4 py-1 block mx-auto w-full rounded-full font-bold text-black
                               hover:bg-white hover:bg-opacity-70">
                    Send Request
                </button>
            </form>
        </div>

        <!-- Footer -->
        <footer
            class="absolute bottom-0 left-0 w-full bg-gradient-to-r from-gray-700 via-gray-800 to-gray-700 pt-2 pb-2">
            <p class="text-center text-white">&copy; 2025 BlueArt. All Rights Reserved.</p>
        </footer>
    </div>
</x-guest-layout>