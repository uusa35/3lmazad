<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * // fetch all ads that has users (only with roles) and has deals with free / paid plan;
     */
    public function index()
    {
        $elements = $this->ad->with('deals.plan')->whereHas('deals', function ($q) {
            if (request()->type === 'due') {
                return $q->where('end_date', '<', Carbon::now())->whereHas('plan', function ($q) {
                    return $q->where('is_paid', true);
                });
            } elseif (request()->type === 'paid') {
                return $q->where('end_date', '>', Carbon::now())->whereHas('plan', function ($q) {
                    return $q->where('is_paid', true);
                });
            } elseif (request()->type === 'free') {
                return $q->where('end_date', '>', Carbon::now())->whereHas('plan', function ($q) {
                    return $q->where('is_paid', false);
                });
            } else {
                return $q->where('end_date', '>', Carbon::now());
            }
        })->whereHas('user', function ($q) {
            return $q->whereHas('roles', function ($q) {
                return $q;
            });
        })->get();
        return view('backend.modules.ad.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
