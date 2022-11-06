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
        "title" => "Order List"
    ]);
});

Route::get('/order/add', function () {
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

Route::get('/master/payment/list', 'App\Http\Controllers\SourceController@index')->name('index');
Route::get('/master/payment/add', 'App\Http\Controllers\SourceController@create')->name('create');
Route::post('/master/payment/store', 'App\Http\Controllers\SourceController@store')->name('store');

