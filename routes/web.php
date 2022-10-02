<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// halaman dashboard
Route::get('/', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});

// halaman order menu
Route::get('/order-menu', function () {
    return view('order_menu', [
        "title" => "Order Menu"
    ]);
});

// halaman order menu
Route::get('/product-menu', function () {
    return view('product_menu', [
        "title" => "Product Menu"
    ]);
});
