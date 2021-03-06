<?php

namespace App\Http\Controllers\Frontend;

use App\AbuseReport;
use App\Http\Requests\Frontend\NewsletterPost;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Commercial;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Contactus;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\Slider;
use App\Models\Term;
use App\Services\Search\Filters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $latestAds = $this->ad->has('category')->orderBy('created_at', 'desc')->take(15)->get()->reverse();
        $commercialsFixed = $this->commercial->fixed()->orderBy('created_at', 'desc')->take(2)->get();
        $commercialsNotFixed = $this->commercial->notFixed()->inRandomOrder()->take(2)->get();
        $sliders = Slider::orderBy('order', 'desc')->get();
        return view('frontend.home', compact('sliders', 'commercials', 'mostVisitedAds', 'commercialsFixed', 'commercialsNotFixed', 'latestAds'));
    }

    /**
     * @param HomePageSearch $request
     * @return users || news || presentations
     * Fields : search + type
     */
    public function search(Filters $filters)
    {
        $validator = validator(request()->all(), ['search' => 'nullable']);
//        'parent' => 'required_without:sub', 'sub' => 'required_without:parent'
        if ($validator->fails()) {
            return redirect()->home()->withErrors($validator->messages());
        }

        $elements = Ad::filters($filters)->paginate(12);

        if (!$elements->isEmpty()) {
            return view('frontend.modules.ad.index', compact('elements'));
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

    public function faq()
    {
        $elements = Faq::all();
        return view('frontend.pages.faq', compact('elements'));
    }

    public function terms()
    {
        $elements = Term::all();
        return view('frontend.pages.terms', compact('elements'));
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

    public function reportAbuse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required|numeric',
            'abuser_id' => 'required|numeric',
            'reporter_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', trans('message.report_is_not_submitted'));
        }

        $element = AbuseReport::create($request->all());
        if ($element) {
            return redirect()->back()->with('success', trans('message.report_submitted'));
        }
        return redirect()->back()->with('error', trans('message.report_is_not_submitted'));
    }
}
