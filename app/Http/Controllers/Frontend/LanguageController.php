<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;


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

        app()->setLocale($lang);

        session()->put('locale', $lang);

        Date::setLocale($lang);

        return redirect()->back();
    }

}
