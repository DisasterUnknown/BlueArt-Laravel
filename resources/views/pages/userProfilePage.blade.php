@extends('layouts.app')

@section('title', 'Profile Page')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/userProfilePage.js') }}
@endsection

@section('content')
<div class="space-y-4 min-h-[calc(100vh-92px)]" id="userProfilePageView">
    <p id="profileWelcome" class="text-2xl font-bold text-center mt-8 mb-20">Welcome, [Username]!</p>
    <div id="userProfile">
        <div class="flex flex-col md:flex-row items-center justify-center">
            <div id="pfpDisplay" class="relative border-4 aspect-square w-[40%] sm:w-[20%] md:w-[20%] lg:w-[20%] xl:w-[12%] rounded-full hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                <img id="displayPFP" src="{{ asset('assets/uploadImg.webp') }}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-full" />
                <input type="file" accept="image/*" id="pfpIN" class="hidden">
                <p id="pfpbase64" class="hidden">null</p>
                <div class="relative z-10 w-full h-full flex items-center justify-center">
                    <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                </div>
            </div>
            <div class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] md:w-[50%] px-3 py-2 mt-10 mx-auto md:mx-0 md:ml-10 md:mt-0 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
                <div id="nameDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                    <p class="text-xl font-semibold">Name: </p>
                    <input type="text" placeholder="User&nbsp;Name:"
                        class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 w-[70%] rounded-full hover:bg-opacity-10"
                        id="userNameIN">
                </div>
                <p id="editProfile" class="text-center"></p>
                <button id="editUserName&PfpBtn" class="border hover:bg-white/20 py-2 px-8 mb-3 mx-2 md:mx-[10%] md:mt-0.5 rounded-full transition-colors duration-500">Edit</button>
            </div>
        </div>
    </div>

    <!-- Change Password section -->
    <div class="flex justify-center mt-40">
        <div class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] xl:w-[60%] px-3 py-2 mt-10 md:mt-20 mx-auto md:mx-0 md:ml-10 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
            <div id="nameDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                <p class="md:text-xl font-semibold hidden sm:block">New Password: </p>
                <input type="text" placeholder="New&nbsp;Password:"
                    class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 mx-auto sm:mx-0 w-[85%] sm:w-[70%] rounded-full hover:bg-opacity-10"
                    id="newPassIN">
            </div>
            <div id="nameDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                <p class="md:text-xl font-semibold hidden sm:block">Confirm Password: </p>
                <input type="text" placeholder="Confirm&nbsp;Password:"
                    class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 mx-auto sm:mx-0 w-[85%] sm:w-[70%] rounded-full hover:bg-opacity-10"
                    id="confirmPassIN">
            </div>
            <div id="nameDiv" class="flex justify-between mx-2 md:mx-[10%] my-3">
                <p class="md:text-xl font-semibold hidden sm:block">Old Password: </p>
                <input type="text" placeholder="Old&nbsp;Password:"
                    class="border border-balck bg-white text-white bg-opacity-5 px-3 py-0.5 mb-3 mx-auto sm:mx-0 w-[85%] sm:w-[70%] rounded-full hover:bg-opacity-10"
                    id="oldPassIN">
            </div>
            <p id="changePass" class="text-center"></p>
            <button id="changePassBtn" class="border hover:bg-white/20 py-2 px-8 mb-3 mx-2 md:mx-[10%] rounded-full transition-colors duration-500">Change Password</button>
        </div>
    </div>
</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection