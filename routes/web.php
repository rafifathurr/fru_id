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
Route::get('/order/list', function () {
    return view('order_list', [
        "title" => "List Order"
    ]);
});

Route::get('/order-menu/add', function () {
    return view('add_order', [
        "title" => "Add Order"
    ]);
});

// halaman order menu
Route::get('/product/list', function () {
    return view('product_list', [
        "title" => "List Product"
    ]);
});
