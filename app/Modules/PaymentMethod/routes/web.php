<?php

Route::group(['module' => 'PaymentMethod', 'middleware' => ['web'], 'namespace' => 'App\Modules\PaymentMethod\Controllers'], function() {

    Route::resource('payment_method', 'PaymentMethodController');

});
