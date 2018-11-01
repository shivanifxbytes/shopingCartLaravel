<?php

Route::group(['module' => 'Product', 'middleware' => ['web'], 'namespace' => 'App\Modules\Product\Controllers'], function() {

    Route::resource('product', 'ProductController');

});
