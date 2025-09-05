<div class="flex justify-evenly mt-6 flex-wrap gap-4">
    @foreach($productsList as $i => $product)
    <div wire:click="viewProduct({{ $product->id }})"
        class="border w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl 
                                hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] 
                                transition-transform duration-300">

        {{-- Hidden product id --}}
        <div id="artSection{{ $i }}ProductID" class="hidden">{{ $product->id }}</div>

        {{-- Product image --}}
        <div class="relative w-full h-[150px] md:h-[200px] xl:h-[225px] 
                                    rounded-2xl bg-cover bg-center"
            style="background-image: url('{{ $product->images->first()->content ?? asset("assets/placeholder.png") }}')">
        </div>

        {{-- Product details --}}
        <div class="px-3 py-2 bg-blue-500/10 rounded-xl">
            <span class="font-bold text-white truncate block">{{ $product->name }}</span>
            <p class="text-gray-300 text-sm">Price: Rs. {{ number_format($product->price, 2) }}</p>
        </div>
    </div>
    @endforeach
</div>