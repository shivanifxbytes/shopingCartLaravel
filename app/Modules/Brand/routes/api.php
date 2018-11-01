<?php

Route::group(['module' => 'Brand', 'middleware' => ['api'], 'namespace' => 'App\Modules\Brand\Controllers'], function() {

    Route::resource('Brand', 'BrandController');

});
