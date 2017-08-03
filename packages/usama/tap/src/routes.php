<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('product/add/{id}', 'Usama\Tap\TapPaymentController@addProduct')->name('payment.add.product');
    Route::get('product/remove/{id}', 'Usama\Tap\TapPaymentController@removeProduct')->name('payment.remove.product');
    Route::get('product/clear', 'Usama\Tap\TapPaymentController@clearProducts')->name('payment.clear.product');
    Route::get('payment', 'Usama\Tap\TapPaymentController@makePayment')->name('payment.create');
});

