<div>
    <section class="bg-gray-200">
        <div class="mx-auto max-w-screen-xl px-4 py-10 lg:flex lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Online Marketplace.
                    <strong class="font-extrabold text-teal-700 sm:block text-3xl"> Temukan Produk Berkualitas Secara
                        Online Sekarang.
                    </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Telusuri koleksi produk kami dan nikmati belanja online yang lancar.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">

                    @if (auth()->check())
                        <a class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow-xl shadow-gray-500 hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                            href="/offer">
                            Tukarkan penawaran Anda Sekarang!
                        </a>
                    @else
                        <a class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow-xl shadow-gray-500 hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                            href="/auth/login">
                            Mulai sekarang
                        </a>
                    @endif

                    <a class="block w-full rounded px-12 py-3 text-sm font-medium bg-gray-200 text-teal-600 shadow-xl shadow-gray-500 hover:text-teal-700 focus:outline-none focus:ring active:text-teal-500 sm:w-auto"
                        href="#">
                        Pelajari lebih lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
