@extends('layouts.app')

@section('title', 'View Product')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/viewProductDetails.js') }}
@endsection

@section('content')
<div class="space-y-4" id="viewProductDetails">
    <!-- Priduct Details section -->
    <div class="mx-auto">
        <p id="productName" class="text-2xl text-center font-bold text-white mt-5 mb-5 md:mb-10">Product Name</p>
        <div class="flex flex-col md:flex-row justify-center">
            <div id="mainImg" class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[20%] lg:w-[20%] xl:w-[15%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[300px] mx-auto md:mx-1 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500" style="background-image: url('../assets/collectebils1.avif')"></div>
            <div class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] md:w-[50%] px-3 py-2 mt-10 mx-auto md:mx-0 md:ml-10 md:mt-0 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
                <div id="priceDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                    <p class="text-xl font-semibold">Unit Price:</p>
                    <p id="productPrice" class="border px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">Rs.&nbsp;10,500</p>
                </div>
                <div id="discountDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                    <p class="text-xl font-semibold">Discount: </p>
                    <p id="productDiscount" class="border px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">10%</p>
                </div>
                <div id="salesDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                    <p class="text-xl font-semibold">Sales Price: </p>
                    <p id="productSalesPrice" class="border px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">10%</p>
                </div>
                <div id="quantityDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                    <p class="text-xl font-semibold">Quantity: </p>
                    <div class="border flex justify-between px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] text-center rounded-xl">
                        <button id="increaseQuantity"><</button>
                        <p id="productQuantity">1</p>
                        <button id="reduceQuantity">></button>
                    </div>
                </div>
                <p id="userIntraction" class="text-center"></p>
                <button id="productActionBtn" class="border hover:bg-white/20 py-2 px-8 mt-5 mb-3 mx-2 md:mx-[10%] md:mt-5 rounded-full transition-colors duration-500">Add To Cart</button>
            </div>
        </div>
    </div>

    <!-- Description Area -->
    <div class="mx-[5%] md:mx-[10%]">
        <p class="text-2xl font-bold text-white mt-10 md:mt-20 mb-5">Description</p>
        <div class="border mx-5 px-5 py-3 xl:h-[12.5rem] rounded-xl">
            <p id="productDescription">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum provident, officia numquam aliquam eveniet autem enim aspernatur, non deleniti est a nobis dolorem nemo, fugiat incidunt consequatur. Libero, ipsum natus.</p>
        </div>
    </div>

    <!-- Product Images Section -->
    <div id="productExtraImgs">
        <p class="text-2xl text-center font-bold text-white mt-10 md:mt-20 mb-10">Product Gallery</p>
        <!-- Images -->
        <div class="flex flex-col md:flex-row md:flex-wrap justify-center mx-[10%]">
            <div id="productImg1" class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[280px] mx-auto md:mx-3 my-3 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500" style="background-image: url('../assets/collectebils1.avif')"></div>
            <div id="productImg2" class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[280px] mx-auto md:mx-3 my-3 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500" style="background-image: url('../assets/collectebils1.avif')"></div>
            <div id="productImg3" class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[280px] mx-auto md:mx-3 my-3 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500" style="background-image: url('../assets/collectebils1.avif')"></div>
            <div id="productImg4" class="border border-[rgba(0,0,255,0.2)] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[280px] mx-auto md:mx-3 my-3 rounded-2xl bg-cover bg-center hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500" style="background-image: url('../assets/collectebils1.avif')"></div>
        </div>
    </div>

    <!-- Seller View Sales Section -->
    <div id="productDiaplaySales" class="hidden">
        <p class="text-2xl text-center font-bold text-white mt-10 md:mt-20 mb-10">Product Sales</p>
        <div id="salesDisplaySection" class="flex flex-col items-center justify-center">
            <!-- Sales Data -->
        </div>
    </div>

</div>

<!-- Storing the Seller ID -->
<div class="hidden" id="selledID">null</div>

<!-- Getting admin remove sucess msg -->
<div class="hidden" id="adminRemoveResponce">null</div>

<!-- Getting product sales msg -->
<div class="hidden" id="productSalesResponce">null</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection