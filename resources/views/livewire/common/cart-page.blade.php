<div>
    @if(Auth::check() && count($cartItems) > 0)
        <p class="text-2xl text-center font-bold mt-10">Cart</p>

        <div class="flex flex-row flex-wrap justify-evenly mt-8">
            @foreach($cartItems as $item)
                <div wire:click="viewProduct({{ $item['product']->id }})" class="relative border mb-3 mt-2 mx-3 h-40 md:h-60 lg:h-80 w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                    <div class="absolute w-full h-full opacity-40 rounded-xl bg-cover bg-center"
                        style="background-image: url('{{ $item["product"]->images->first()?->content ?? asset('assets/placeholder.png') }}')"></div>

                    <div class="relative z-10 w-full h-full flex flex-col items-center justify-center">
                        <span class="text-lg text-center font-bold text-white">{{ $item['product']->name }}</span>
                        <span class="text-lg mt-[9%] font-bold text-white">
                            Rs. {{ number_format($item['product']->price * $item['quantity'], 2) }}
                        </span>
                        <span class="text-sm text-gray-300">Quantity: {{ $item['quantity'] }}</span>

                        <button wire:click.stop="removeItem({{ $item['product']->id }})"
                                class="border bg-red-500/30 hover:bg-red-600/60 px-4 py-1 mt-[10%] font-semibold rounded-full">
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-10 mt-20">
            <p class="text-4xl text-center font-bold">Total Product Cost</p>
            <p class="text-4xl text-center font-bold mt-5">
                Rs. {{ number_format($total, 2) }}
            </p>
        </div>

        <div class="w-full flex flex-col justify-center items-center my-8 mb-40">
            <a href="{{ url('/checkOutPage') }}">
                <button class="border w-fit bg-green-500/20 hover:bg-green-600/60 text-white font-bold px-6 py-3 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                    Complete Purchase
                </button>
            </a>
        </div>

    @else
        <div class="flex items-center justify-center min-h-[calc(100vh-92px)]">
            <p class="text-4xl text-center font-bold">Sorry, Looks Like Your Cart Is Empty!!</p>
        </div>
    @endif
</div>
