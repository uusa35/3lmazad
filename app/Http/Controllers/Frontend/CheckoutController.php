<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Deal;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // store the deal and make it not valid + create refrence_id
        $deal = $this->createDeal();
        $user = User::whereId(auth()->user()->id)->first();
        $product = Ad::whereId($deal->ad_id)->first();
        $plan = Plan::whereId($deal->plan_id)->first();
        // go to payment route
        $customer = session()->get('customer');
        return view('frontend.modules.checkout.index',compact('user','product','plan','customer','deal'));
    }

    public function createDeal()
    {
        $duration = Plan::whereId(session()->get('pay_plan_id'))->first()->duration;
        $deal = Deal::create([
            'start_date' => Carbon::today(),
            'end_date' => Carbon::now()->addDays($duration),
            'plan_id' => session()->get('pay_plan_id'),
            'ad_id' => session()->get('pay_product_id'),
            'price' => session()->get('totalPrice'),
            'duration' => $duration,
            'total' => session()->get('totalPrice'),
            'valid' => false
        ]);
        return $deal;
    }
}
