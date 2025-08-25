@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$role = $user->role ?? ''; // Assumes your users table has a 'role' column
$userId = $user->id ?? '';
@endphp

<div id="menu"
    class="fixed top-0 left-0 h-full w-[75px] z-20 overflow-y-auto no-scrollbar bg-blue-900/40 backdrop-blur-md shadow-md transition-all duration-300 p-5 hidden md:block">
    <ul class="space-y-5">
        <!-- Always shown -->
        <li>
            <a href="{{ url('/home') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">home</span>
                <span class="menu-text hidden ml-4">Home</span>
            </a>
        </li>

        <!-- Seller Only: Add Product -->
        @if ($role === 'seller')
        <li>
            <a href="{{ url('/sellerShop') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">store</span>
                <span class="menu-text hidden ml-4">My Shop</span>
            </a>
        </li>
        <li>
            <a id="addNewProductNav"
                class="flex cursor-pointer items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">add_box</span>
                <span class="menu-text hidden ml-4">Add Product</span>
            </a>
        </li>
        @endif

        <!-- Customer Only: Cart -->
        @if ($role === 'customer')
        <li>
            <a href="{{ url('/cart') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">shopping_cart</span>
                <span class="menu-text hidden ml-4">My Cart</span>
            </a>
        </li>
        @endif

        <!-- Admin Only: Banned & Kick Users -->
        @if ($role === 'admin')
        <li>
            <a href="{{ url('/viewBannedProducts') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">block</span>
                <span class="menu-text hidden ml-4">Banned Products</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/viewKickUsers') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">person_remove</span>
                <span class="menu-text hidden ml-4">Kick Users</span>
            </a>
        </li>
        @endif

        <!-- Everyone logged in: Profile -->
        @if ($user)
        <li>
            <a href="{{ url('/profile') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">person</span>
                <span class="menu-text hidden ml-4">Profile</span>
            </a>
        </li>
        @endif

        <!-- Always Show About Us -->
        <li>
            <a href="{{ url('/aboutUs') }}"
                class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500">
                <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">groups</span>
                <span class="menu-text hidden ml-4">About Us</span>
            </a>
        </li>

        <!-- Logout Button -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center text-gray-300 font-sans rounded-full hover:bg-black transition-colors duration-500 w-full text-left">
                    <span class="material-symbols-outlined p-2 text-xl rounded-full bg-black">logout</span>
                    <span class="menu-text hidden ml-4">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>