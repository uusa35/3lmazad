<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Contactus;
use App\Models\Newsletter;
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
        return view('frontend.home');
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
