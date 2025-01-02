<?php

use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// detail product
Route::get('/product/details', ProductDetails::class);
