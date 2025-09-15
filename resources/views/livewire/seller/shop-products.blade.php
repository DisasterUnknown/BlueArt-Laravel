<div>
    <div class="mt-5 space-y-3">
        @foreach($bannedProducts as $bannedProduct)
            <div x-data="{ show: true }" x-show="show"
                class="relative w-full bg-red-600/20 text-white font-bold px-4 py-3 rounded-xl shadow-md cursor-pointer md:cursor-auto"
                @click="window.innerWidth < 768 ? window.location.href='{{ route('requestUnbanProduct', $bannedProduct->id) }}' : null">
                ⚠️ The product "{{ $bannedProduct->name }}" has been banned by the admin.

                <!-- Desktop Icons -->
                <div class="absolute top-2 right-3 hidden md:flex space-x-2">
                    <!-- Request Unban -->
                    <a href="{{ route('requestUnbanProduct', $bannedProduct->id) }}"
                        class="bg-white bg-opacity-20 hover:bg-opacity-40 px-2 py-1 rounded-full">
                        Request Reactivation
                    </a>

                    <!-- Dismiss Icon -->
                    <button @click.stop="show = false"
                        class="bg-white bg-opacity-20 hover:bg-opacity-40 px-2 py-1 rounded-full">
                        X
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <p class="text-2xl font-bold text-center mt-5 mb-10">Inventory Hub</p>

    <div class="flex flex-row flex-wrap justify-evenly mt-8">
        <!-- Products  -->
        @foreach($products as $product)
            <div wire:click="viewProduct({{ $product->id }})" class="border my-5 md:mx-5 w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] 
                                                    rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] 
                                                    transition-transform duration-300">

                {{-- Hidden Product ID --}}
                <div class="hidden">{{ $product->id }}</div>

                {{-- Product Image --}}
                <div class="relative w-full h-[150px] md:h-[200px] xl:h-[225px] rounded-2xl bg-cover bg-center"
                    style="background-image: url('{{ $product->images->first()?->content ?? "" }}')">
                </div>

                {{-- Product Info --}}
                <div class="px-3 py-2 bg-blue-500/10 rounded-xl">
                    <span>
                        {{ strlen($product->name) > 12 ? substr($product->name, 0, 12) . "..." : $product->name }}
                    </span>
                    <p>
                        Price: Rs. <span>{{ number_format($product->price) }}</span>
                    </p>

                    <div class="flex items-center justify-center">
                        <button wire:click.stop="removeProduct({{ $product->id }})" class="border py-2 px-4 mt-2 mb-1 mx-auto rounded-xl 
                                                            hover:bg-red-500/60 hover:scale-105 
                                                            hover:shadow-[0_0_15px_2px_rgba(255,0,255,0.8)] 
                                                            transition-transform duration-300">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>