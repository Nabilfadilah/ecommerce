<div class="px-10 md:px-20 ml-30 py-3">
    {{-- brand new --}}
    <h2 class="font-medium text-[20px] my-3">Brand New</h2>
    <livewire:product-listing :category_id="0" :current_product_id="0" />
    {{-- @include('components.navigation.view-all', [
        'Category' => 'Brand New',
    ])
    <livewire:product-listing :category_id="0" :current_product_id="0" /> --}}

    {{-- smartphones & laptop --}}
    <h2 class="font-medium text-[20px] my-3">Digital Products</h2>
    <livewire:product-listing category_id="4" :current_product_id="0" />
    {{-- @include('components.navigation.view-all', [
        'Category' => 'Digital Products',
    ])
    <livewire:product-listing :category_id="4" :current_product_id="0" /> --}}


    {{-- outfits --}}
    <h2 class="font-medium text-[20px] my-3">Fashion and Apparel</h2>
    <livewire:product-listing :category_id="1" :current_product_id="0" />
    {{-- @include('components.navigation.view-all', [
        'Category' => 'Fashion and Apparel',
    ])
    <livewire:product-listing :category_id="1" :current_product_id="0" /> --}}

</div>
