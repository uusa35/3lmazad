<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('payment', 'Usama\Tap\TapPaymentController@makePayment')->name('payment.create');
    Route::get('result', 'Usama\Tap\TapPaymentController@result')->name('payment.result');
    Route::get('error', 'Usama\Tap\TapPaymentController@error')->name('payment.error');
});

