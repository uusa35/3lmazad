<?php

use App\Models\Ad;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\User;
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
    $models = Brand::whereId($id)->first()->models()->orderBy('order', 'asc')->get()->toArray();
    return response()->json(['models' => $models], 200);
});

Route::get('category/{id}', function ($id) {
    $category = Category::whereId($id)->with('fields')->first();
    if (!$category->is_parent) {
        $category = $category->parent()->with('fields')->first();
    }
    if ($category->fields->where('name', 'brand_id')->first()) {
        $parent = Category::whereId($category->id)
            ->with('fields.options', 'children', 'types', 'brands')
            ->first();
    } else {
        $parent = Category::whereId($category->id)->with('fields.options', 'children', 'types')->first();
    }
    return response()->json(['parent' => $parent], 200);

});

Route::get('colors', function () {
    $colors = Color::orderBy('order', 'asc')->get()->toArray();
    $sizes = Size::all()->toArray();
    return response()->json(['colors' => $colors, 'sizes' => $sizes], 200);
});

Route::get('sizes', function () {
    $colors = Color::orderBy('order', 'asc')->get()->toArray();
    $sizes = Size::all()->toArray();
    return response()->json(['colors' => $colors, 'sizes' => $sizes], 200);
});

Route::get('areas', function () {
    $areas = Area::with('cities')->get();
    return response()->json(['areas' => $areas], 200);
});

Route::get('area/{id}/cities', function ($id) {
    $cities = Area::whereId($id)->first()->cities()->orderBy('id', 'desc')->get()->toArray();
    return response()->json(['cities' => $cities], 200);
});
Route::get('favorites/{ad_id}/{user_id}', function ($ad_id, $user_id) {
    $ad = Ad::whereId($ad_id)->first();
    $ad->favorites()->toggle($user_id);
    return response()->json(['message' => 'success'], 200);
});


Route::get('toggle/mobile/{status}/{user_id}', function ($status, $user_id) {
    $user = User::whereId($user_id)->first();
    $user->update(['is_mobile_visible' => $status]);
    return response()->json(['message' => 'success'], 200);
});

Route::get('toggle/email/{status}/{user_id}', function ($status, $user_id) {
    $user = User::whereId($user_id)->first();
    $user->update(['is_email_visible' => $status]);
    return response()->json(['message' => 'success'], 200);
});