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
Route::get('/product/delete/{id}', '\App\Modules\Product\Controllers\ProductController@destroy')->name('product.destroy')->middleware('auth');
Route::get('/product/show/{id}', '\App\Modules\Product\Controllers\ProductController@show')->name('product.show')->middleware('auth');
Route::get('/addProduct/{product_id?}', '\App\Modules\Product\Controllers\ProductController@getProduct')->name('addProduct')->middleware('auth');
Route::post('/addProduct/{product_id?}', '\App\Modules\Product\Controllers\ProductController@postProduct')->name('addProduct')->middleware('auth');


//category route
Route::get('/category', '\App\Modules\Category\Controllers\CategoryController@index')->name('category.index')->middleware('auth');
Route::get('/addCategory/{category_id?}', '\App\Modules\Category\Controllers\CategoryController@getCategory')->name('addCategory')->middleware('auth');
Route::post('/addCategory/{category_id?}', '\App\Modules\Category\Controllers\CategoryController@postCategory')->middleware('auth');
Route::get('category/show/{id}', '\App\Modules\Category\Controllers\CategoryController@show')->name('category.show')->middleware('auth');

//payment method route
Route::get('/payment_method', '\App\Modules\PaymentMethod\Controllers\PaymentMethodController@index')->name('payment_method.index')->middleware('auth');
Route::get('/payment_method/create', '\App\Modules\PaymentMethod\Controllers\PaymentMethodController@create')->name('payment_method.create')->middleware('auth');
Route::get('/payment_method/show/{id}', '\App\Modules\PaymentMethod\Controllers\PaymentMethodController@show')->name('payment_method.show')->middleware('auth');

//order method route
Route::get('/order', '\App\Modules\Order\Controllers\OrderController@index')->name('order.index')->middleware('auth');

//brand method route
Route::get('/brand', '\App\Modules\Brand\Controllers\BrandController@index')->name('brand.index')->middleware('auth');
Route::get('/addBrand/{brand_id?}', '\App\Modules\Brand\Controllers\BrandController@getBrand')->name('addBrand')->middleware('auth');
Route::post('/addBrand/{brand_id?}', '\App\Modules\Brand\Controllers\BrandController@postBrand')->name('postBrand')->middleware('auth');
Route::get('/deleteBrand/{brand_id?}', '\App\Modules\Brand\Controllers\BrandController@deleteBrand');
