<?php

use App\Livewire\AboutUs;
use App\Livewire\AddCategory;
use App\Livewire\AddProductForm;
use App\Livewire\AdminDashboard;
use App\Livewire\AllProduct;
use App\Livewire\Contacts;
use App\Livewire\EditProduct;
use App\Livewire\ManageCategories;
use App\Livewire\ManageOrders;
use App\Livewire\ManageProduct;
use App\Livewire\ProductDetails;
use App\Livewire\ShoppingCartComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// detail product
Route::get('/product/{product_id}/details', ProductDetails::class);

Route::get('/all/products', AllProduct::class);
Route::get('/about', AboutUs::class);
Route::get('/contacts', Contacts::class);


// admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/admin/products', ManageProduct::class)->name('products');
    Route::get('/admin/orders', ManageOrders::class)->name('orders');
    Route::get('/admin/products/add', AddProductForm::class);
    Route::get('/admin/categories', ManageCategories::class);
    Route::get('/admin/categories/add', AddCategory::class);
    Route::get('/admin/product/edit/{id}', EditProduct::class);
});
