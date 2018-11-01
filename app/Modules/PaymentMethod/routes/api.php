<?php

Route::group(['module' => 'PaymentMethod', 'middleware' => ['api'], 'namespace' => 'App\Modules\PaymentMethod\Controllers'], function() {

    Route::resource('payment_method', 'PaymentMethodController');

});
