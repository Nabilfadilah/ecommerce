<div>
    <div class="flex gap-5 p-20">
        <img src="{{ $product->image ? Storage::url($product->image) : asset('images/watch1.jpg') }}" alt="product-images"
            class="rounded-t-lg object-cover w-[300px] h-[280px]">
        <div>
            <h2 class="p-1 font-medium text-2xl line-clamp-2">{{ $product->name }}</h2>
            <h2 class="p-1 text-gray-500 line-clamp-4">{{ $product->description }}</h2>
            <div class="flex gap-10">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-sm px-1">{{ $product->category->name }}</h2>
                </div>
                <h2 class="text-sm font-medium">{{ $product->price }}</h2>
            </div>

            <div class="px-3 py-2">
                <a href="/add/to/cart"
                    class="flex items-center justify-center gap-2 w-full text-center rounded bg-teal-900 hover:bg-teal-800 text-white px-12 py-2 text-sm font-medium focus:outline-none focus:ring active:bg-teal-700 sm:w-auto">
                    <i class="fa fa-cart-plus text-white"></i> <!-- Ikon cart -->
                    Add to cart
                </a>
            </div>
        </div>
    </div>

    {{-- related product --}}
    <div class="my-5 px-20 pt-5">
        <h2 class="text-2xl font-medium">Related Products</h2>
        <livewire:product-listing :category_id="$product->category_id" :current_product_id="$product->id" />
    </div>
</div>
