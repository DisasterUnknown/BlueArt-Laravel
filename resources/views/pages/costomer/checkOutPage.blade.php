<x-app-layout title="Check Out">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="checkOut" x-data="checkOutAlpine" x-init="init()">
        <div id="checkOutPage" class="flex flex-col items-center justify-center space-y-4 min-h-[calc(80vh)]">
            <p class="text-2xl mb-5 mt-8 font-bold">Complete Your Purchase</p>
            <div class="flex w-[100%] sm:w-auto items-center justify-center " id="checkOutPage">
                <form action="{{ route('checkOut') }}" method="POST"
                    class="flex flex-col bg-white bg-opacity-5 backdrop-blur-lg p-8 w-[100%] sm:w-[350px] shadow-lg rounded-xl shadow-lg hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
                    @csrf

                    <div class="flex flex-row justify-between mb-2">
                        <input type="tel" placeholder="Phone&nbsp;Number:" x-model="phoneNumber" @input="formatPhone"
                            name="phoneNumber" value="{{ old('phoneNumber') }}"
                            class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                            id="telIN" maxlength="12">
                    </div>
                    <div class="flex flex-row justify-between mb-2">
                        <input type="text" placeholder="Address:" name="address" value="{{ old('address') }}"
                            class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                            id="addressIN">
                    </div>
                    <div class="flex flex-row justify-between">
                        <label class="text-white mr-5 ml-1">Shipping&nbsp;Method:</label>
                        <select id="shipppingMethodSelect" name="shipingMethod"
                            class="border border-white/60 border-r-10 bg-white text-white/60 bg-opacity-5 mb-1 px-1.5 pb-0.5 w-full rounded-full hover:bg-opacity-10">
                            <option value="standard" class="bg-white text-black">Standard</option>
                            <option value="express" class="bg-white text-black">Express</option>
                            <option value="nextDay" class="bg-white text-black">Next-Day</option>
                        </select>
                    </div>
                    <hr class="my-10">
                    <div class="flex flex-row justify-between mb-2">
                        <input type="text" placeholder="Cardholder&nbsp;Name:" name="cardHolderName"
                            value="{{ old('cardHolderName') }}"
                            class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                            id="cardHolderNameIN">
                    </div>
                    <div class="flex flex-row justify-between mb-2">
                        <input type="text" placeholder="Card&nbsp;Number:" x-model="cardNumber" @input="formatCard"
                            name="cardNumber" value="{{ old('cardNumber') }}"
                            class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                            id="cardNumberIN" minlength="13" maxlength="19">
                    </div>
                    <div class="flex flex-row justify-between mb-2">
                        <input type="text" placeholder="CVC:" name="CVC" x-model="cvc" @input="formatCVC"
                            value="{{ old('CVC') }}"
                            class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-full rounded-full hover:bg-opacity-10"
                            id="cvcIN" minlength="3" maxlength="4">
                    </div>

                    <div class="flex flex-col items-center mx-auto mt-4">
                        @if(session('success'))
                            <p class="mb-1 text-center text-green-600 font-bold">{{ session('success') }}</p>
                        @else
                            <p class="mb-1 text-center text-red-600 font-bold">{{ session('error') }}</p>
                        @endif
                        <button id="checkOutBtn"
                            class="border font-bold py-1 px-4 w-[120px] rounded-xl hover:scale-101 hover:bg-white/10 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">Check
                            Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>