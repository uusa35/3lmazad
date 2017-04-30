<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{

    /**
     *
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLocale($lang)
    {
        App::setLocale($lang);

        Session::put('locale',$lang);

        return redirect()->back();
    }

}
