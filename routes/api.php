<?php

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


Route::get('areas', function () {
    return response()->json(Area::all(), 200);
});

Route::get('cat/{id}/brands', function ($id) {
    $category = Category::whereId($id)->first();
    if ($category->isParent) {
        $brands = $category->brands()->get();
    } else {
        $brands = $category->parent()->first()->brands()->get();
    }
    return response()->json($brands, 200);
});

Route::get('cat/{id}/fields', function ($id) {
    $category = Category::whereId($id)->first();
    if ($category->isParent) {
        $fields = $category->form()->first()->fields()->get();
    } else {
        $fields = $category->parent()->first()->form()->first()->fields()->get();
    }
    return response()->json($fields, 200);
});

Route::get('brand/{id}/models', function ($id) {
    $models = Brand::whereId($id)->first()->models()->get();
    return response()->json($models, 200);
});
