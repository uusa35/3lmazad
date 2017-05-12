<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\NewsletterPost;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Commercial;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Contactus;
use App\Models\Newsletter;
use App\Models\Slider;
use App\Services\Search\Filters;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public $ad;
    public $commercial;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Ad $ad, Commercial $commercial)
    {
//        $this->middleware('auth');
        $this->ad = $ad;
        $this->commercial = $commercial;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mostVisitedAds = $this->ad->getMostVisitedAds();
        $commercialsFixed = $this->commercial->fixed()->take(2)->get();
        $commercialsNotFixed = $this->commercial->notFixed()->inRandomOrder()->take(2)->get();
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('frontend.home', compact('sliders', 'commercials', 'mostVisitedAds', 'commercialsFixed', 'commercialsNotFixed'));
    }

    /**
     * @param HomePageSearch $request
     * @return users || news || presentations
     * Fields : search + type
     */
    public function search(Filters $filters)
    {
        $validator = validator(request()->all(), ['search' => 'min:3', 'main' => 'required_without:sub','sub' => 'required_without:main']);
        if ($validator->fails()) {
            return redirect()->home()->withErrors($validator->messages());
        }

        $elements = Ad::filters($filters)->get(['id','category_id','price','type_id','brand_id','model_id']);
        return $elements;

        if (!$elements->isEmpty()) {
            return view('frontend.modules.pages.search', compact('elements'));
        } else {
            return redirect()->home()->with('error', title_case('no items found .. plz try again'));
        }
    }

    public function postNewsletter(NewsletterPost $request)
    {
        $newsletter = Newsletter::create($request->all());

        if ($newsletter) {

            return redirect()->back()->with('success', 'you have subscribed successfully to our newsletter list');

        }

        return redirect()->back()->with('error', 'error occured please try again later ...');
    }

    public function aboutus()
    {
        $elements = Aboutus::all();
        return view('frontend.pages.aboutus', compact('elements'));
    }

    public function getContactus()
    {
        $element = Contactus::first();
        return view('frontend.pages.contactus', compact('element'));
    }

    public function postContactus(Request $request)
    {
        $element = Contactus::first();

        $email = Mail::to(config('mail.from.address'))->queue(new \App\Mail\Contactus($request->all(), $element));

        return redirect()->back()->with('success', 'email has been sent');

    }
}
