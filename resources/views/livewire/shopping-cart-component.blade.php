<section>
    <div class="mx-auto max-w-3xl pt-5 pb-5">
        <header class="text-center flex gap-3">
            <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Keranjang Anda</h1>
            <div wire:loading
                class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-blue-500"
                role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </header>

        <div class="mt-8">
            <ul class="space-y-4">
                @foreach ($cartItems as $item)
                    <li class="flex items-center gap-4">
                        <img src="{{ Storage::url($item->product->image) }}" alt=""
                            class="size-16 rounded object-cover" />

                        <div>
                            <h3 class="text-sm text-gray-900">{{ $item->product->name }}</h3>
                            <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                <div>
                                    <dt class="inline">Harga:</dt>
                                    <dd class="inline">{{ $item->product->price }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="flex flex-1 items-center justify-end gap-2">
                            <form>
                                <label for="Line{{ $item->id }}Qty" class="sr-only"> Quantity </label>
                                <input type="number" min="1" value="{{ $item->quantity }}"
                                    id="Line{{ $item->id }}Qty"
                                    wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                    class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                            </form>

                            <button wire:click="removeItem({{ $item->id }})"
                                class="text-gray-600 transition hover:text-red-600">
                                <span class="sr-only">Remove item</span>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                <div class="w-screen max-w-lg space-y-4">
                    <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="flex justify-between">
                            <dt>Subtotal</dt>
                            <dd>Rp. {{ $subtotal }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Pajak</dt>
                            <dd>Rp. {{ $vat }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Diskon</dt>
                            <dd>-Rp. {{ $discount }}</dd>
                        </div>
                        <div class="flex justify-between !text-base font-medium">
                            <dt>Total</dt>
                            <dd>Rp. {{ $total }}</dd>
                        </div>
                    </dl>

                    <div class="flex justify-end">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700">
                            <i class="fa fa-ticket" aria-hidden="true"></i>
                            <p class="whitespace-nowrap text-xs"> 1 Diskon Berlaku</p>
                        </span>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a wire:navigate
                            class="block rounded bg-blue-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-blue-600"
                            href="/">
                            Lanjutkan Berbelanja
                        </a>
                        <a href="#"
                            class="flex gap-3 items-center rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>
                            Check-out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
