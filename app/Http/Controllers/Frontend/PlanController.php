<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PlanController extends Controller
{
    public $plan;
    public $ad;

    public function __construct(Plan $plan, Ad $ad)
    {
        $this->plan = $plan;
        $this->ad = $ad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay_ad_id = session()->get('pay_ad_id');
        if (!$pay_ad_id) {
            return redirect()->route("home")->with('error', 'Unknown error for pay ad id');
        }
        $this->authorize('isOwner', $this->ad->withoutGlobalScopes()->whereId($pay_ad_id)->first()->user_id);
        $elements = $this->plan->all();
        $ad = Ad::whereId($pay_ad_id)->first();
        return view('frontend.modules.plan.index', compact('elements', 'ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404, 'soon payment shall be available');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
