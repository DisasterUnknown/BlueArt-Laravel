@extends('layouts.app')

@section('title', 'Home Page')

@section('scriptIndex')
    {{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
    {{ asset('JavaScript/home.js') }}
@endsection

@section('content')
<div class="space-y-4" id="homePage">
    {{-- Art display section --}}
    <div>
        <p class="text-2xl text-center font-bold text-white mt-20 lg:mt-5">Art</p>
        <div id="artIndexDisplaySection" class="flex justify-evenly mt-8">
            <div id="artCategory" class="relative border h-[150px] md:h-[200px] xl:h-[225px] w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300"> 
                <img src="{{ asset('assets/art1.jpg') }}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" />
                <div class="relative z-10 w-full h-full flex items-center justify-center">
                    <span class="text-lg font-bold text-white">View All</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Collectibles display section --}}
    <div>
        <p class="text-2xl text-center font-bold text-white mt-10 lg:mt-20">Collectibles</p>
        <div id="collectiblesIndexDisplaySection" class="flex justify-evenly mt-8">
            <div id="collectablesCategory" class="relative border h-[150px] md:h-[200px] xl:h-[225px] w-[40%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">  
                <img src="{{ asset('assets/collectebils1.avif') }}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" />
                <div class="relative z-10 w-full h-full flex items-center justify-center">
                    <span class="text-lg font-bold text-white">View All</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Backend replay section --}}
<div class="hidden" id="compleateResponce">null</div>
<div class="hidden" id="responce">null</div>
@endsection
