<?php

/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
|
| the model who has the foreign is the one that belongsTo and vise verse :)
|
*/

Auth::routes();

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('aboutus', 'HomeController@aboutus')->name('aboutus');
    Route::get('contactus', 'HomeController@contactus')->name('contactus');
    Route::post('newsletter', 'HomeController@postNewsletter')->name('newsletter');
    Route::get('/lang/{lang}', 'LanguageController@changeLocale');
});

Route::group(['namespace' => 'backend'], function () {

});

