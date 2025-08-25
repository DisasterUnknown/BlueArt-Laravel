@php
    $role = session('RoleID') ?? '';
@endphp

<div id="mobileMenu"
    class="absolute top-16 left-4 right-4 bg-black/50 backdrop-blur-md rounded-lg p-5 z-40 md:hidden hidden">
    <ul class="space-y-4">
        <li><a href="{{ url('/') }}" class="block text-gray-300 hover:text-white transition">Home</a></li>

        {{-- Seller Only --}}
        @if(Str::startsWith($role, 'SE'))
            <li><a href="{{ url('/Pages/sellerShop') }}" class="block text-gray-300 hover:text-white transition">My Shop</a></li>
            <li><a id="addNewProductNavMobile" class="block cursor-pointer text-gray-300 hover:text-white transition">Add Product</a></li>
        @endif

        {{-- Customer Only and Guest --}}
        @if(!Str::startsWith($role, 'SE') && !Str::startsWith($role, 'AD'))
            <li><a href="{{ url('/Pages/cartPage') }}" class="block text-gray-300 hover:text-white transition">My Cart</a></li>
        @endif

        {{-- Admin Only --}}
        @if(Str::startsWith($role, 'AD'))
            <li><a href="{{ url('/Pages/viewBannedProducts') }}" class="block text-gray-300 hover:text-white transition">Banned Products</a></li>
            <li><a href="{{ url('/Pages/viewKickUsers') }}" class="block text-gray-300 hover:text-white transition">Kick Users</a></li>
        @endif

        {{-- Profile for logged-in users --}}
        @if(Str::startsWith($role, 'AD') || Str::startsWith($role, 'CU') || Str::startsWith($role, 'SE'))
            <li><a href="{{ url('/Pages/userProfilePage') }}" class="block text-gray-300 hover:text-white transition">Profile</a></li>
        @endif

        {{-- Always show --}}
        <li><a id="logInOutMobile" href="{{ url('/Pages/login') }}" class="block text-gray-300 hover:text-white transition">Logout</a></li>
        <li><a href="{{ url('/Pages/aboutUsPage') }}" class="block text-gray-300 hover:text-white transition">About Us</a></li>
    </ul>
</div>
