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
    Route::post('contactus', 'HomeController@postContactus');
    Route::post('newsletter', 'HomeController@postNewsletter')->name('newsletter');
    Route::get('/lang/{lang}', 'LanguageController@changeLocale');
    /*
     * the following route for both (search + categories menu) === petrolet.dev/search?type=user&main=3&sub=7
     * returns all companies related to main or sub category included within the filter
     * parent category (product or service)
     *   main === whatever
     *      sub === whatever
     * also note that $categories (with featured boolean) var is available within homepage you can loop through anytime
     * another $categories (without featured boolean) var is available for other pages needed (refer to ViewComposer.php)
     * */
    Route::any('search', 'HomeController@search')->name('search');
});

Route::group(['namespace' => 'backend', 'prefix' => 'backend','as' => 'backend.','middleware' => ['auth','adminOnly']], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

