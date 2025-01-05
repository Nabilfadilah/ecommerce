<a wire:navigate href="{{ route('shopping-cart') }}" class="relative">
    <i class="fa fa-cart-arrow-down"></i>
    <span class="absolute bottom-2 left-4 inline-block w-3 h-5 text-center text-white bg-red-600 rounded-full ">
        {{ $cartCount }}
    </span>
</a>
