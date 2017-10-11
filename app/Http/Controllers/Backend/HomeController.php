<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Plan;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        session()->put('info','يرجى عدم إدخال أي بيانات حقيقية حيث أن الموقع في مرحلة الاختبار ');
        return view('backend.home');
    }

    public function toggleActivate(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleFeatured(Request $request)
    {
        $className = '\App\Models\\' . title_case($request->model);
        $element = new $className();
        $element = $element->whereId($request->id)->first();
        $element->update([
            'featured' => !$element->featured
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function exportTranslations()
    {
        Artisan::call('publish-trans');
        return redirect()->back()->with('success', 'translations exported');
    }
}
