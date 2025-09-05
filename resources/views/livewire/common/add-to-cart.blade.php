<div class="text-center">
    @if($message)
        <p class="text-green-400 mt-4">{{ $message }}</p>
    @endif
    <button wire:click="addToCart"
        class="border hover:bg-white/20 py-2 px-8 mt-5 mb-3 mx-2 md:mx-[10%] md:mt-5 rounded-full transition-colors duration-500">
        Add to Cart
    </button>
</div>
