<?php

Route::group(['module' => 'Brand', 'middleware' => ['web'], 'namespace' => 'App\Modules\Brand\Controllers'], function() {

    Route::resource('Brand', 'BrandController');

});
