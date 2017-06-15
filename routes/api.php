<?php

use App\Models\Ad;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('brand/{id}/models', function ($id) {
    $models = Brand::whereId($id)->first()->models()->get()->toArray();
    return response()->json($models, 200);
});

Route::get('favorites/{ad_id}/{user_id}', function ($ad_id, $user_id) {
    $ad = Ad::whereId($ad_id)->first();
    $ad->favorites()->toggle($user_id);
    return response()->json(['message' => 'success'], 200);
});
