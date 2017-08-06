<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Plan;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }

    public function toggleActivate(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleFeatured(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->withoutGloalScopes()->whereId($request->id)->first();
        $element->update([
            'featured' => !$element->featured
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }
}
