@extends('layouts.app')

@section('title', 'Cart Page')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/cartPage.js') }}
@endsection

@section('content')
<div id="viewCartDetails">
    <!-- No Products in the cart section -->
    <div id="noProductCartId" class="flex items-center justify-center min-h-[calc(100vh-92px)]">
        <p class="text-4xl text-center font-bold">Sorry, Looks Like Your Cart Is Empty!!</p>
    </div>


    <!-- Cart Items Display Section -->
    <div id="containProductCartId">
        <p class="text-2xl text-center font-bold mt-10">Cart</p>
        <div id="productCards" class="flex flex-row flex-wrap justify-evenly mt-8">
            <div class="relative border mb-3 mt-2 mx-3 h-40 md:h-60 lg:h-80 w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                <div id="productIdContainer" class="hidden">null</div>
                <img src="{{asset('assets/art1.jpg')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" />
                <div class="relative z-10 w-full h-full flex flex-col items-center justify-center">
                    <span class="text-lg text-center font-bold text-white">Product Name</span>
                    <span class="text-lg mt-[9%] font-bold text-white">Rs. 20,000</span>
                    <button class="border bg-white/10 hover:bg-red-500/30 px-4 py-1 mt-[10%] font-semibold rounded-full">Remove</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Cart Display Price Section -->
    <div id="productPriceCartId" class="mb-10 mt-20">
        <p class="text-4xl text-center font-bold">Total Product Cost</p>
        <p id="displayTotalProductCost" class="text-4xl text-center font-bold mt-5">Rs. 40,200</p>
    </div>


    <!-- Cart Check Out -->
    <div id="payBtnDiv" class="w-full flex flex-col justify-center items-center my-8 mb-40">
        <p id="noLoginErrorMsg" class="w-fit mx-auto mb-2 text-red-600 font-semibold">Please Login First!!</p>
        <button id="payBtn" class="border w-fit bg-green-500/20 hover:bg-green-600/60 text-white font-bold px-6 py-3 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
            Complete Purchase
        </button>
    </div>
</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null</div>
<div class="hidden" id="responce">null</div>
@endsection