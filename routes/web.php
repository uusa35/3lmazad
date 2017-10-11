<?php

Auth::routes();

//Route::get('test', function () {
//    return 'test';
//});

Route::group(['namespace' => 'Frontend'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('user', 'UserController', ['except' => ['create', 'store', 'delete', 'index']]);
        Route::group(['as' => 'account.'], function () {
            Route::get('/account', 'UserController@account')->name('user');
            Route::get('/ads', 'UserController@adsList')->name('user.ads');
            Route::get('ad/toggle/republish/{id}', 'AdController@getToggleRepublish')->name('ad.republish');
            Route::post('ad/toggle/republish/{id}', 'AdController@postToggleRepublish')->name('ad.republish');
            Route::resource('menu', 'MenuController');
            Route::resource('service', 'ServiceController');
        });
        Route::any('setting', 'SettingController@index')->name('setting.index');
        Route::any('setting/mobile', 'SettingController@toggleMobile')->name('setting.mobile');
        Route::any('setting/email', 'SettingController@toggleEmail')->name('setting.email');
        Route::resource('favorite', 'FavoriteController');
        Route::get('report/abuse', 'HomeController@reportAbuse')->name('report.abuse');
        Route::resource('ad', 'AdController', ['except' => ['show', 'index']]);
        Route::get('/ad/toggle/booked/{id}', 'AdController@toggleBooked')->name('ad.booked');
        Route::resource('gallery', 'GalleryController', ['except' => 'show', 'index']);
        Route::resource('image', 'ImageController', ['except' => 'show', 'index']);
        Route::resource('plan', 'PlanController');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('aboutus', 'HomeController@aboutus')->name('aboutus');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::get('terms', 'HomeController@terms')->name('terms');
    Route::get('contactus', 'HomeController@getContactus')->name('contactus');
    Route::post('contactus', 'HomeController@postContactus');
    Route::post('newsletter', 'HomeController@postNewsletter')->name('newsletter');
    Route::get('/lang/{lang}', 'LanguageController@changeLocale')->name('lang');
    Route::get('/user/ads/{id}', 'UserController@ads')->name('user.ads');
    Route::resource('user', 'UserController', ['only' => ['index', 'show']]);
    Route::get('merchants-groups', 'UserController@merchantsGroups')->name('user.merchants-groups');
    Route::resource('auction', 'AuctionController', ['only' => ['store']]);
    Route::resource('comment', 'CommentController', ['only' => ['store']]);
    Route::resource('ad', 'AdController', ['only' => ['show', 'index']]);
    Route::resource('gallery', 'GalleryController', ['only' => 'show', 'index']);
    Route::resource('service', 'ServiceController', ['only' => 'show', 'index']);
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
});


Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('ad', 'AdController');
    Route::get('activation', 'HomeController@toggleActivate')->name('activation');
    Route::get('featured', 'HomeController@toggleFeatured')->name('featured');
    Route::resource('aboutus', 'AboutusController');
    Route::resource('faq', 'FaqController');
    Route::resource('term', 'TermsController');
    Route::resource('area', 'AreaController');
    Route::resource('group', 'GroupController');
    Route::resource('deal', 'DealController');
    Route::resource('plan', 'PlanController');
    Route::resource('contactus', 'ContactusController');
    Route::resource('slider', 'SliderController');
    Route::resource('commercial', 'CommercialController');
    Route::resource('category', 'CategoryController');
    Route::resource('menu', 'MenuController');
    Route::resource('brand', 'BrandController');
    Route::resource('model', 'ModelController');
    Route::get('assign/category/{id}', 'CategoryController@getAssignField')->name('category.assign');
    Route::post('assign/category/{id}', 'CategoryController@postAssignField')->name('category.assign');
    Route::resource('option', 'OptionController');
    Route::resource('field', 'FieldController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('abuse', 'AbuseReportController');
    Route::resource('comment', 'CommentController');
    Route::resource('auction', 'AuctionController');
    Route::resource('color', 'ColorController');
    Route::resource('size', 'SizeController');
    Route::resource('type', 'TypeController');
    Route::resource('image', 'ImageController');
    Route::get('export/language', 'HomeController@exportTranslations')->name('export.translations');
//    Route::resource('newsletter', 'NewsletterController');
});

/*
 * for development
 * first : admin
 * second : user
 * */
if (!app()->environment('production') && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->home();
    });
}


Route::get('test', function () {
    return 'this is the test route';
});