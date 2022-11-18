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

// ALL CONTROLLERS
Route::namespace('App\Http\Controllers')->group(function (){

    // ROUTE TO SOURCE PAYMENT CONTROLLERS
    Route::namespace('source_payment')->prefix('source-payment')->name('source_payment.')->group(function () {
        Route::get('/', 'SourceControllers@index')->name('index');
        Route::get('create', 'SourceControllers@create')->name('create');
        Route::post('store', 'SourceControllers@store')->name('store');
        Route::get('detail/{id}', 'SourceControllers@detail')->name('detail');
        Route::get('edit/{id}', 'SourceControllers@edit')->name('edit');
        Route::post('update', 'SourceControllers@update')->name('update');
        Route::post('delete', 'SourceControllers@delete')->name('delete');
    });

    // ROUTE TO SUPPLIER CONTROLLERS
    Route::namespace('supplier')->prefix('supplier')->name('supplier.')->group(function () {
        Route::get('/', 'SupplierControllers@index')->name('index');
        Route::get('create', 'SupplierControllers@create')->name('create');
        Route::post('store', 'SupplierControllers@store')->name('store');
        Route::get('detail/{id}', 'SupplierControllers@detail')->name('detail');
        Route::get('edit/{id}', 'SupplierControllers@edit')->name('edit');
        Route::post('update', 'SupplierControllers@update')->name('update');
        Route::post('delete', 'SupplierControllers@delete')->name('delete');
    });

    // ROUTE TO CATEGORY CONTROLLERS
    Route::namespace('category')->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'CategoryControllers@index')->name('index');
        Route::get('create', 'CategoryControllers@create')->name('create');
        Route::post('store', 'CategoryControllers@store')->name('store');
        Route::get('detail/{id}', 'CategoryControllers@detail')->name('detail');
        Route::get('edit/{id}', 'CategoryControllers@edit')->name('edit');
        Route::post('update', 'CategoryControllers@update')->name('update');
        Route::post('delete', 'CategoryControllers@delete')->name('delete');
    });
});


