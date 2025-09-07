@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$role = $user->role ?? ''; 
$userId = $user->id ?? '';
@endphp

<div id="mobileMenu"
    class="absolute top-16 left-4 right-4 bg-black/50 backdrop-blur-md rounded-lg p-5 z-40 md:hidden hidden">
    <ul class="space-y-4">
        @if ($role != '')
            <li><a href="{{ url('pages/common/home') }}" class="block text-gray-300 hover:text-white transition">Home</a></li>
        @endif

        {{-- Seller Only --}}
        @if ($role === 'seller')
            <li><a href="{{ url('/sellerShop') }}" class="block text-gray-300 hover:text-white transition">My Shop</a></li>
            <li><a href="{{ url('/addProduct') }}" id="addNewProductNavMobile" class="block cursor-pointer text-gray-300 hover:text-white transition">Add Product</a></li>
        @endif

        {{-- Customer Only and Guest --}}
        @if ($role === 'customer')
            <li><a href="{{ url('/cart') }}" class="block text-gray-300 hover:text-white transition">My Cart</a></li>
        @endif

        {{-- Admin Only --}}
        @if ($role === 'admin')
            <li><a href="{{ url('/viewBannedProducts') }}" class="block text-gray-300 hover:text-white transition">Banned Products</a></li>
            <li><a href="{{ url('/viewKickUsers') }}" class="block text-gray-300 hover:text-white transition">Kick Users</a></li>
        @endif

        {{-- Profile for logged-in users --}}
        @if ($user)
            <li><a href="{{ url('/user/profile') }}" class="block text-gray-300 hover:text-white transition">Profile</a></li>
        @endif

        {{-- Always show --}}
        <li><a href="{{ url('/aboutUs') }}" class="block text-gray-300 hover:text-white transition">About Us</a></li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li>
                <button type="submit"
                    class="block text-gray-300 hover:text-white transition">
                    @if ($role === '')
                    <span>Login</span>
                    @else
                    <span>Logout</span>
                    @endif
                </button>
            </li>
        </form>
    </ul>
</div>
