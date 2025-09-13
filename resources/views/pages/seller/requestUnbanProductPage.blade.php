<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Request Product Unban') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-[calc(100vh-92px)] py-10">
        <div class="w-full max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                    Submit a Request
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Your product "<span class="font-semibold">{{ $product->name }}</span>" has been banned by the admin.<br>
                    Please fill out the form below to request a review. Be clear and concise in your message.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('postRequestUnbanProduct') }}" class="space-y-4">
                    @csrf

                    <!-- Hidden Product ID -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Message -->
                    <div>
                        <x-label for="message" value="{{ __('Reason / Message') }}" class="text-gray-700 dark:text-gray-200"/>
                        <textarea id="message" name="message" rows="5" required
                                  placeholder="Explain why this product should be unbanned..."
                                  class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:ring-pink-500 focus:border-pink-500">{{ old('message') }}</textarea>
                    </div>

                    <!-- Error / Success Messages -->
                    @if ($errors->any())
                        <div class="mt-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 px-4 py-3 rounded">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mt-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mt-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-pink-600 text-white px-6 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
