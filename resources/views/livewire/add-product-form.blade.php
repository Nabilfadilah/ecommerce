<div>
    {{-- <livewire:bread-crumb :url="$currentUrl" /> --}}
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <form wire:submit="save">
                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Tambah Produk Baru
                        </h2>
                    </div>

                    <!-- product name -->
                    <div class="sm:col-span-3">
                        <label for="af-submit-application-full-name"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Nama produk
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div>
                            <input placeholder="Enter Nama produk" type="text" wire:model="product_name"
                                id="af-submit-application-full-name"
                                class="py-2 px-3 pe-11 block w-full border border-white shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            @error('product_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- price -->
                    <div class="sm:col-span-3">
                        <label for="product_price"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Harga
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input placeholder="0" wire:model="product_price" id="product_price" type="text"
                            oninput="this.value = formatRupiah(this.value)"
                            class="py-2 px-3 pe-11 block w-full border border-white shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        @error('product_price')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        function formatRupiah(value) {
                            const numberString = value.replace(/[^,\d]/g, "").toString();
                            const split = numberString.split(",");
                            const sisa = split[0].length % 3;
                            let rupiah = split[0].substr(0, sisa);
                            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                            if (ribuan) {
                                const separator = sisa ? "." : "";
                                rupiah += separator + ribuan.join(".");
                            }

                            return split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
                        }
                    </script>


                    <!-- category -->
                    <div class="sm:col-span-3">
                        <label for="af-submit-application-email"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Kategori
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <select wire:model="category_id"
                            class="py-3 px-4 pe-9 block w-full border border-white rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option selected="">Select Product Category</option>
                            @foreach ($all_categories as $category)
                                <option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Section -->

                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Lebih Detail
                        </h2>
                    </div>

                    <!-- untuk wadah photo -->
                    <div class="sm:col-span-3"></div>
                    <div class="sm:col-span-9">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="Product image" height="300px" width="300px"
                                class="rounded-lg">
                        @else
                            <img src="{{ asset('images/avatar.png') }}" alt="default image" height="300px"
                                width="300px" class="rounded-lg">
                        @endif
                    </div>

                    <!-- product image -->
                    <div class="sm:col-span-3">
                        <label for="af-submit-application-resume-cv"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Gambar Produk
                        </label>
                    </div>

                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = true" x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress" class="sm:col-span-9">
                        <label for="file" class="sr-only">Choose Image</label>
                        <input type="file" wire:model="photo" id="file"
                            class="block w-full border  shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                        @error('photo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <!-- File Uploading Progress Form -->
                        <div x-show="uploading">
                            <!-- Progress Bar -->
                            <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                    role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                        :style="`width: ${progress}%`"></div>
                                </div>
                                <div class="w-6 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white" x-text="`${progress}%`"></span>
                                </div>
                            </div>
                            <!-- End Progress Bar -->
                        </div>
                        <!-- End File Uploading Progress Form -->
                    </div>

                    <!-- product description -->
                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-submit-application-bio"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Deskripsi Produk
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <textarea wire:model="product_description" id="af-submit-application-bio"
                            class="py-2 px-3 block w-full border border-white rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6" placeholder="Tambahkan deskripsi produk di sini!"></textarea>
                        @error('product_description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading
                        class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full"
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Submit and Save
                </button>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>
