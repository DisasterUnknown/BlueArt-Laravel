<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="viewProductDetails">
        <!-- Product Details section -->
        <div class="mx-auto">
            <p id="productName" class="text-2xl text-center font-bold text-white mt-5 mb-5 md:mb-10">
                {{ $product->name }}
            </p>
            <div class="flex flex-col md:flex-row justify-center">

                <!-- Main Image -->
                <div id="mainImg"
                    class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[20%] lg:w-[20%] xl:w-[15%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[300px] mx-auto md:mx-1 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500"
                    style="background-image: url('{{ $product->images->first()?->content ?? asset('images/placeholder.png') }}')">
                </div>

                <!-- Add to Cart Form -->
                <form action="{{ route('addToCart') }}" method="POST"
                    class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] md:w-[50%] px-3 py-2 mt-10 mx-auto md:mx-0 md:ml-10 md:mt-0 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500"
                    x-data="{
                          quantity: {{ $product->quantity ?? 1 }},
                          price: {{ $product->price }},
                          discount: {{ $product->discount ?? 0 }},
                          get salesPrice() {
                              let discounted = this.price * (1 - this.discount / 100);
                              return (discounted * this.quantity).toFixed(2);
                          },
                          increase() {
                              if (this.quantity < {{ $product->quantity ?? 50 }}) this.quantity++;
                          },
                          decrease() {
                              if (this.quantity > 1) this.quantity--;
                          }
                      }">
                    @csrf

                    <!-- Hidden Inputs for product_id and quantity -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" :value="quantity">

                    <!-- Price -->
                    <div id="priceDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Unit Price:</p>
                        <p id="productPrice"
                            class="border px-5 md:px-5 w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">Rs.
                            {{ number_format($product->price) }}
                        </p>
                    </div>

                    <!-- Discount -->
                    <div id="discountDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Discount: </p>
                        <p id="productDiscount"
                            class="border px-5 md:px-5 w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">
                            {{ $product->discount }}%
                        </p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Quantity:</p>
                        <div class="flex border rounded-xl w-[50%] md:w-[45%] lg:w-[40%] text-center">
                            <button type="button" @click="decrease()" class="px-3">-</button>
                            <p class="flex-1 text-center" x-text="quantity"></p>
                            <button type="button" @click="increase()" class="px-3">+</button>
                        </div>
                    </div>

                    <!-- Sales Price -->
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Sales Price:</p>
                        <p class="border px-5 md:px-5 w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">
                            Rs. <span x-text="salesPrice"></span>
                        </p>
                    </div>

                    <!-- Action Button -->
                    <div class="text-center">
                        @if(auth()->check() && auth()->id() === $product->user_id)
                            <a href="{{ route('addProduct', $product->id) }}">
                                <button type="button"
                                    class="border hover:bg-white/20 py-2 px-8 mt-5 mb-3 mx-2 md:mx-[10%] md:mt-5 rounded-full transition-colors duration-500">
                                    Manage Product
                                </button>
                            </a>
                        @elseif(auth()->check() && auth()->user()->role === 'admin')
                            <input type="hidden" name="action" value="ban">
                            <button type="submit" id="productActionBtn"
                                class="border hover:bg-white/20 py-2 px-8 mt-5 mb-3 mx-2 md:mx-[10%] md:mt-5 rounded-full transition-colors duration-500">
                                Ban Product
                            </button>
                        @else
                            @if(session('success'))
                                <p class="mb-1 text-center text-green-600 font-bold">{{ session('success') }}</p>
                            @else
                                <p class="mb-1 text-center text-red-600 font-bold">{{ session('error') }}</p>
                            @endif
                            <button type="submit" id="productActionBtn"
                                class="border hover:bg-white/20 py-2 px-8 mt-5 mb-3 mx-2 md:mx-[10%] md:mt-5 rounded-full transition-colors duration-500">
                                Add to Cart
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Description Area -->
        <div class="mx-[5%] md:mx-[10%]">
            <p class="text-2xl font-bold text-white mt-10 md:mt-20 mb-5">Description</p>
            <div class="border mx-5 px-5 py-3 xl:h-[12.5rem] rounded-xl">
                <p id="productDescription">{{ $product->description ?? 'No description provided.' }}</p>
            </div>
        </div>

        <!-- Product Images Section -->
        @if ($product->images->count() > 1)
            <div id="productExtraImgs">
                <p class="text-2xl text-center font-bold text-white mt-10 md:mt-20 mb-10">Product Gallery</p>
                <div class="flex flex-col md:flex-row md:flex-wrap justify-center mx-[10%]">
                    @forelse($product->images->slice(1) as $image)
                        <div class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] 
                                                h-[280px] mx-auto md:mx-3 my-3 rounded-2xl bg-cover bg-center 
                                                hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] 
                                                transition-colors duration-500"
                            style="background-image: url('{{ $image->content }}')">
                        </div>
                    @empty
                        <p class="text-gray-400 text-center">No gallery images available.</p>
                    @endforelse
                </div>
            </div>
        @endif

        <!-- Seller View Sales Section -->
        @if(auth()->check() && auth()->id() === $product->user_id && $product->sales->count() > 0)
            <div id="productDisplaySales" class="mt-10 md:mt-20">
                <p class="text-2xl text-center font-bold text-white mt-20 mb-6">Product Sales</p>

                <div class="overflow-x-auto">
                    <table class="min-w-full rounded-t-lg overflow-hidden shadow-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Buyer</th>
                                <th class="px-4 py-2 text-left">Quantity</th>
                                <th class="px-4 py-2 text-left">Total Amount</th>
                                <th class="px-4 py-2 text-left">Phone</th>
                                <th class="px-4 py-2 text-left">Address</th>
                                <th class="px-4 py-2 text-left">Shipping Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product->sales as $sale)
                                <tr class="border-b border-l border-r rounded-lg hover:bg-gray-100/20">
                                    <td class="px-4 py-2">{{ $sale->customer->name ?? $sale->customerID }}</td>
                                    <td class="px-4 py-2">{{ $sale->quantity ?? 1 }}</td>
                                    <td class="px-4 py-2">Rs. {{ number_format($sale->amount, 2) }}</td>
                                    <td class="px-4 py-2">{{ $sale->phoneNumber }}</td>
                                    <td class="px-4 py-2">{{ $sale->address }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($sale->shippingMethod) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">No sales data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>