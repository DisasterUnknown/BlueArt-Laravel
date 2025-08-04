@extends('layouts.app')

@section('title', 'Seller Shop')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/sellerShop.js') }}
@endsection

@section('content')
<div class="space-y-4 min-h-[calc(100vh-92px)]" id="sellerShopPage">
    <p class="text-2xl font-bold text-center mt-8 mb-10">Inventory Hub</p>
    <div id="productsSections" class="flex flex-row flex-wrap justify-evenly mt-8">
        <!-- Page Data -->
    </div>
</div>

<!-- Confirmation Popup -->
<div id="confirmPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center hidden justify-center z-50" style="position: fixed !important;">
    <div class="border bg-black p-6 rounded-2xl shadow-xl text-center w-80">
        <p class="text-lg font-semibold mb-4">Are you sure you want to remove this product?</p>
        <div class="flex justify-around">
            <button id="confirmYes" class="border bg-red-500/5 text-white px-4 py-2 rounded hover:bg-red-600">Yes</button>
            <button id="confirmNo" class="border bg-gray-300/5 text-white px-4 py-2 rounded hover:bg-gray-400">No</button>
        </div>
    </div>
</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection