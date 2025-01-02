<div>
    <div class="flex gap-5 p-20">
        <img src="{{ asset('images/watch1.jpg') }}" alt="product-image" class="rounded-lg">
        <div>
            <h2 class="p-1 font-medium text-2xl line-clamp-2">Product Title</h2>
            <h2 class="p-1 text-gray-500 line-clamp-4">It is acreative hub where image. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Qui iure voluptatibus quo, tenetur aut magnam debitis sed beatae facere
                harum exercitationem pariatur nostrum dicta corrupti fuga dolorum incidunt repudiandae blanditiis!</h2>
            <div class="flex gap-10">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-sm px-1">Outfit</h2>
                </div>
                <h2 class="text-sm font-medium">Rp. 450.000</h2>
            </div>

            <div class="px-3 py-2">
                <a href="#"
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
        <livewire:product-listing />
    </div>
</div>
