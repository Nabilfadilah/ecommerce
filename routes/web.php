<?php

use App\Livewire\AddProductForm;
use App\Livewire\AdminDashboard;
use App\Livewire\ManageOrders;
use App\Livewire\ManageProduct;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// detail product
Route::get('/product/details', ProductDetails::class);

// admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('/admin/products', ManageProduct::class)->name('products');
    Route::get('/admin/orders', ManageOrders::class)->name('orders');
    Route::get('/admin/products/add', AddProductForm::class);
});
