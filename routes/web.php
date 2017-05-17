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
    Route::get('contactus', 'HomeController@getContactus')->name('contactus');
    Route::post('contactus', 'HomeController@postContactus');
    Route::post('newsletter', 'HomeController@postNewsletter')->name('newsletter');
    Route::get('/lang/{lang}', 'LanguageController@changeLocale')->name('lang');
    /*
     * the following route for both (search + categories menu) === petrolet.dev/search?type=user&main=3&sub=7
     * returns all companies related to main or sub category included within the filter
     * parent category (product or service)
     *   main === whatever
     *      sub === whatever
     *          children == whatever
     * also note that $categories (with featured boolean) var is available within homepage you can loop through anytime
     * another $categories (without featured boolean) var is available for other pages needed (refer to ViewComposer.php)
     * */
    /*
     * ?sub=2&type=4&brand=6&model=31&have_images=1&area=3&room_no=2&floor_no=9&bathroom_no=1&furnished=1
     * */
    Route::any('search', 'HomeController@search')->name('search');
    Route::resource('ad', 'AdController');
});


Route::group(['namespace' => 'backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'Usercontroller');
    Route::resource('aboutus', 'AboutusController');
    Route::resource('contactus', 'ContactusController');
    Route::resource('slider', 'Slidercontroller');
    Route::resource('category', 'CategoryController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('image', 'ImageController');
    Route::resource('newsletter', 'NewsletterController');
});

/*
 * for development
 * first : admin
 * second : user
 * */
if (app()->environment() === 'local' && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->home();
    });
}

