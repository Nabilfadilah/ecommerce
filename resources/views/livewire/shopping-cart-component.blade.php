<section>
    <div class="mx-auto max-w-4xl pt-5 pb-5">
        <header class="text-center flex gap-3 justify-center">
            <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Keranjang Belanja Anda</h1>
            <div wire:loading
                class="animate-spin inline-block h-6 w-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full"
                role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </header>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Daftar Produk -->
            <div class="col-span-2">
                <ul class="space-y-6">
                    @foreach ($cartItems as $item)
                        <li class="flex items-center gap-4 border-b pb-4">
                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}"
                                class="h-16 w-16 rounded object-cover" />

                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name }}</h3>
                                <p class="text-sm text-gray-600">Harga: {{ formatRupiah($item->product->price) }}</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <form>
                                    <label for="Line{{ $item->id }}Qty" class="sr-only">Quantity</label>
                                    <input type="number" min="1" value="{{ $item->quantity }}"
                                        id="Line{{ $item->id }}Qty"
                                        wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                        class="h-10 w-16 rounded border-gray-300 bg-gray-50 p-2 text-center text-sm text-gray-600 focus:ring focus:ring-blue-300" />
                                </form>

                                <button wire:click="removeItem({{ $item->id }})"
                                    class="text-gray-600 transition hover:text-red-600">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Ringkasan Pembayaran -->
            <div class="p-3 bg-gray-100 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Ringkasan Pembayaran</h2>
                <dl class="mt-4 space-y-2 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <dt>Subtotal</dt>
                        <dd>{{ formatRupiah($subtotal) }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Pajak</dt>
                        <dd>{{ formatRupiah($vat) }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Diskon</dt>
                        <dd>-{{ formatRupiah($discount) }}</dd>
                    </div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <dt>Total</dt>
                        <dd>{{ formatRupiah($total) }}</dd>
                    </div>
                </dl>

                <div class="mt-6 flex justify-between items-center">
                    <a href="/"
                        class="inline-block rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-500">
                        Lanjut Belanja
                    </a>
                    <a href="#"
                        class="inline-flex items-center gap-2 rounded bg-green-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-green-500">
                        <i class="fa fa-shopping-cart"></i>
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
