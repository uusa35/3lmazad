<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Commercial;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Contactus;
use App\Models\Newsletter;
use App\Models\Slider;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return $ads;
        $commercials = Commercial::all();

        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('frontend.home', compact('sliders', 'commercials','ads'));
    }

    /**
     * @param HomePageSearch $request
     * @return users || news || presentations
     * Fields : search + type
     */
    public function search(Filters $filters)
    {
        $validator = validator(request()->all(), ['type' => 'nullable', 'search' => 'required|min:3']);
        if ($validator->fails()) {
            return redirect()->home()->withErrors($validator->messages());
        }

        if (request()->type === 'news') {
            $elements = Newswe::filters($filters)->paginate(12);
        } elseif (request()->type === 'presentation') {
            $elements = Presentation::filters($filters)->paginate(12);
        } elseif (request()->type === 'announcement') {
            $elements = Announcement::filters($filters)->paginate(12);
        } else {
            request()->type = 'user';
            $elements = User::filters($filters)->paginate(12);
        }

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
