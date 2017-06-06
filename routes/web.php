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
    Route::get('/', 'HomeController@index');
    Route::get('aboutus', 'HomeController@aboutus')->name('aboutus');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::get('terms', 'HomeController@terms')->name('terms');
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
    Route::resource('user', 'UserController', ['except' => 'create', 'store', 'delete']);
    Route::resource('auction', 'AuctionController', ['only' => 'store']);
    Route::resource('comment', 'CommentController', ['only' => 'store']);
    Route::resource('favorite', 'FavoriteController');
    Route::any('setting', 'SettingController@index')->name('setting.index');
    Route::any('setting/mobile', 'SettingController@toggleMobile')->name('setting.mobile');
    Route::any('setting/email', 'SettingController@toggleEmail')->name('setting.email');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'Usercontroller');
    Route::resource('aboutus', 'AboutusController');
    Route::resource('faq', 'FaqController');
    Route::resource('terms', 'TermController');
    Route::resource('contactus', 'ContactusController');
    Route::resource('slider', 'Slidercontroller');
    Route::resource('category', 'CategoryController');
    Route::resource('gallery', 'GalleryController');
//    Route::resource('image', 'ImageController');
    Route::resource('newsletter', 'NewsletterController');
});

/*
 * for development
 * first : admin
 * second : user
 * */
//if (app()->environment() === 'local' && Schema::hasTable('users')) {
Route::get('/logwith/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect()->home();
});
//}

