<div class="bg-gray-100 rounded-md hover:border border-teal-900 p-1 shadow-md shadow-gray-500 mb-5">

    <a href="/product/{{ $product->id }}/details">

        {{-- image --}}
        <div>
            <img src="{{ $product->image ? Storage::url($product->image) : asset('images/banner1.jpg') }}"
                alt="product-images" class="rounded-t-lg object-cover w-full h-[180px]">
        </div>

        {{-- deskripsi --}}
        <div>
            <h2 class="line-clamp-1 px-3 font-medium">{{ $product->name }}</h2>
            <h2 class="line-clamp-2 px-3">{{ $product->description }}</h2>

            {{-- price & type --}}
            <div class="flex justify-between px-3 py-2">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-sm px-1">{{ $product->category->name }}</h2>
                </div>
                <h2 class="text-sm font-medium">{{ formatRupiah($product->price) }}</h2>
                {{-- <h2 class="text-sm font-medium">Rp. {{ $product->price }}</h2> --}}
            </div>

            {{-- button add  --}}
            @if (auth()->check())
                <a wire:click.prevent="addToCart({{ $product->id }})" href="#">
                    <div
                        class="flex items-center justify-center gap-2 w-full text-center rounded bg-teal-900 hover:bg-teal-800 text-white px-12 py-2 text-sm font-medium focus:outline-none focus:ring active:bg-teal-700 sm:w-auto">
                        <div wire:loading
                            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-blue-500"
                            role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <i class="fa fa-cart-plus text-white"></i> <!-- Ikon cart -->
                        <span>Add to cart</span>
                    </div>
                </a>
        </div>
    @else
        <a wire:navigate href='/auth/login'>
            <div
                class="flex items-center justify-center gap-2 w-full text-center rounded bg-teal-900 hover:bg-teal-800 text-white px-12 py-2 text-sm font-medium focus:outline-none focus:ring active:bg-teal-700 sm:w-auto">
                <i class="fa fa-cart-plus text-white"></i> <!-- Ikon cart -->
                <span>Add to Cart</span>
            </div>
        </a>
        @endif
    </a>
</div>
