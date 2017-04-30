<?php

/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
|
| the model who has the foreign is the one that belongsTo and vise verse :)
|
*/

use App\Models\User;

Route::get('/', function () {
    $users = User::all();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
