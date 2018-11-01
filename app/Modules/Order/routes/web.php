<?php

Route::group(['module' => 'Order', 'middleware' => ['web'], 'namespace' => 'App\Modules\Order\Controllers'], function() {

    Route::resource('Order', 'OrderController');

});
