<div class="bg-gray-100 shadow-sm rounded-md hover:border border-teal-900 p-1">

    <a href="/product/details">

        {{-- image --}}
        <div>
            <img src="{{ asset('images/banner1.jpg') }}" alt="product-image" class="rounded object-cover" height="400px"
                width="400px">
        </div>

        {{-- deskripsi --}}
        <div>
            <h2 class="line-clamp-2 px-3">It is a creative hub where imagination meets craftsmanship to transform ideal.
                Lorem, ipsum dolor sit amet
                consectetur adipisicing elit. Unde ducimus vel inventore ipsum doloribus esse recusandae veritatis.
            </h2>

            {{-- price & type --}}
            <div class="flex justify-between px-3 py-2">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-sm px-1">Outfit</h2>
                </div>
                <h2 class="text-sm font-medium">Rp. 450.000</h2>
            </div>

            {{-- button add  --}}
            <div class="px-3 py-2">
                <a href="#"
                    class="flex items-center justify-center gap-2 w-full text-center rounded bg-teal-900 hover:bg-teal-800 text-white px-12 py-2 text-sm font-medium focus:outline-none focus:ring active:bg-teal-700 sm:w-auto">
                    <i class="fa fa-cart-plus text-white"></i> <!-- Ikon cart -->
                    Add to cart
                </a>
            </div>
        </div>
    </a>
</div>
