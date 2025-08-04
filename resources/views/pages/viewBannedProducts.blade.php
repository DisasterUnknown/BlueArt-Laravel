@extends('layouts.app')

@section('title', 'View Banned Products')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/viewBannedProducts.js') }}
@endsection

@section('content')
<div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewBannedProducts">
    <p class="text-2xl font-bold text-center mt-8 mb-10">Banned Products</p>
    <div id="BanProducts" class="flex flex-row flex-wrap justify-evenly mt-8">
        <!-- Page Data -->
    </div>
</div>

<!-- Backend replay section -->
<div class="" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection