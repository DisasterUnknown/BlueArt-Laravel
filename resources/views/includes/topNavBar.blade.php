@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$role = $user->role ?? ''; // Assumes your users table has a 'role' column
$userId = $user->id ?? '';
@endphp

<div class="flex justify-between bg-blue-900/50 absolute top-0 left-0 w-full z-10 px-2 py-2 md:pl-[75px]">
    <div class="flex">
        <button id="hamburger" class="z-60 md:hidden bg-white/10 p-2 pb-0 rounded">
            <span class="material-symbols-outlined text-white">menu</span>
        </button>
        <a href="{{ url('/home') }}" class="text-xl py-1 px-3 text-white custom-font font-bold">BlueArt</a>
    </div>

    <!-- Customer and Guest view cart -->
    @if ($role != 'seller' && $role != 'admin')
        <a href="{{ url('/cart') }}"
            class="border bg-white bg-opacity-5 backdrop-blur-lg py-1 px-3 text-white font-semibold rounded hover:bg-opacity-10">Cart</a>
    @endif

    <!-- Admin View Users -->
    @if ($role == 'admin')
        <a href="{{ url('/viewUsers') }}"
            class="border bg-white bg-opacity-5 backdrop-blur-lg py-1 px-3 text-white font-semibold rounded hover:bg-opacity-10">View Users</a>
    @endif

    <!-- Seller Add Product -->
    @if ($role == 'seller')
        <a href="{{ url('/addProduct') }}"
            class="border cursor-pointer bg-white bg-opacity-5 backdrop-blur-lg py-1 px-3 text-white font-semibold rounded hover:bg-opacity-10">Add Product</a>
    @endif
</div>