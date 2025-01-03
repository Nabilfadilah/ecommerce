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
Route::get('/admin/dashboard', AdminDashboard::class)->name('dashboard')->middleware('admin');
Route::get('/admin/products', ManageProduct::class)->name('products')->middleware('admin');
Route::get('/admin/orders', ManageOrders::class)->name('orders')->middleware('admin');
