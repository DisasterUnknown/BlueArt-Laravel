<div class="space-y-8">
    {{-- If both empty --}}
    @if($artProducts->isEmpty() && $collectiblesProducts->isEmpty())
        <p class="text-center text-gray-400 text-lg font-bold mt-10">eShop empty</p>
    @endif

    {{-- Anime Section --}}
    @if(!empty($randomAnime))
        <div>
            <p class="text-xl text-center font-bold text-white mt-10 mb-8">Advertisements</p>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-4">
                @foreach($randomAnime as $anime)
                    <a href="{{ $anime['url'] }}"
                        class="bg-gray-900 rounded-lg overflow-hidden shadow hover:scale-105 hover:shadow-[0_0_10px_rgba(255,255,255,0.4)] transition-transform duration-300"
                        target="_blank">

                        {{-- Cover --}}
                        <div class="relative w-full h-[160px] bg-gray-800">
                            <img src="{{ $anime['images']['jpg']['large_image_url'] ?? asset('assets/placeholder.png') }}"
                                alt="{{ $anime['title'] }}" class="w-full h-full object-cover">
                            <div class="absolute top-1 left-1 bg-black/70 text-white text-[10px] px-2 py-0.5 rounded">
                                {{ $anime['rating'] ?? 'N/A' }}
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-2">
                            <p class="text-xs text-gray-400">{{ $anime['status'] ?? 'Unknown Status' }}</p>
                            <h3 class="text-sm font-semibold text-white truncate">{{ $anime['title'] }}</h3>
                            <p class="text-[11px] text-yellow-400">⭐ {{ $anime['score'] ?? 'N/A' }}</p>

                            {{-- Genres --}}
                            @if(!empty($anime['genres']))
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach($anime['genres'] as $genre)
                                        <span class="text-[10px] bg-gray-700 text-gray-200 px-2 py-0.5 rounded">
                                            {{ $genre['name'] }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif


    {{-- Art --}}
    @if($artProducts->isNotEmpty())
        <div>
            <p class="text-2xl text-center font-bold text-white mt-10">Art</p>
            <div class="flex justify-evenly mt-6 flex-wrap gap-4">
                @foreach($artProducts as $i => $product)
                    <div wire:click="viewProduct({{ $product->id }})" class="border w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl 
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

                {{-- View All --}}
                <a href="{{ route('categoriesPage', 'art') }}" class="relative border h-[210px] md:h-[260px] xl:h-[280px] 
                                       w-[40%] md:w-[20%] xl:w-[15%] rounded-2xl 
                                       hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] 
                                       transition-transform duration-300">
                    <img src="{{ asset('assets/art1.jpg') }}" alt="Background"
                        class="absolute w-full h-full object-cover opacity-40 rounded-xl" />
                    <div class="relative z-10 w-full h-full flex items-center justify-center">
                        <span class="text-lg font-bold text-white">View All</span>
                    </div>
                </a>
            </div>
        </div>
    @endif

    {{-- Collectibles --}}
    @if($collectiblesProducts->isNotEmpty())
        <div>
            <p class="text-2xl text-center font-bold text-white mt-10">Collectibles</p>
            <div class="flex justify-evenly mt-6 flex-wrap gap-4">
                @foreach($collectiblesProducts as $i => $product)
                    <div wire:click="viewProduct({{ $product->id }})" class="border w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl 
                                                hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] 
                                                transition-transform duration-300">

                        {{-- Hidden product id --}}
                        <div id="collectibleSection{{ $i }}ProductID" class="hidden">{{ $product->id }}</div>

                        {{-- Product image --}}
                        @php
                            $image = $product->images->first();
                        @endphp
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

                {{-- View All --}}
                <a href="{{ route('categoriesPage', 'collectibles') }}" class="relative border h-[210px] md:h-[260px] xl:h-[280px]
                                       w-[40%] md:w-[20%] xl:w-[15%] rounded-2xl 
                                       hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] 
                                       transition-transform duration-300">
                    <img src="{{ asset('assets/collectebils1.avif') }}" alt="Background"
                        class="absolute w-full h-full object-cover opacity-40 rounded-xl" />
                    <div class="relative z-10 w-full h-full flex items-center justify-center">
                        <span class="text-lg font-bold text-white">View All</span>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>