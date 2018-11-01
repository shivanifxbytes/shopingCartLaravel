<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
//product route
Route::get('/product', '\App\Modules\Product\Controllers\ProductController@index')->name('product.index')->middleware('auth');
Route::get('/product/create', '\App\Modules\Product\Controllers\ProductController@create')->name('product.create')->middleware('auth');
Route::post('/product', '\App\Modules\Product\Controllers\ProductController@store')->name('product.store')->middleware('auth');
//category route
Route::get('/category', '\App\Modules\Category\Controllers\CategoryController@index')->name('category.index')->middleware('auth');
Route::get('/category/create', '\App\Modules\Category\Controllers\CategoryController@create')->name('category.create')->middleware('auth');
Route::get('/category/{category}/edit', '\App\Modules\Category\Controllers\CategoryController@edit')->name('category.edit')->middleware('auth');
//payment method route
Route::get('/payment_method', '\App\Modules\PaymentMethod\Controllers\PaymentMethodController@index')->name('payment_method.index')->middleware('auth');
Route::get('/payment_method/create', '\App\Modules\PaymentMethod\Controllers\PaymentMethodController@create')->name('payment_method.create')->middleware('auth');
