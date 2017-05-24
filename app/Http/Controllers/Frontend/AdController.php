<?php

namespace App\Http\Controllers\Frontend;

use App\Jobs\CreateNewVisitorForAd;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    protected $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if the parent id is there go ahead and make the session
        request()->has('parent') ? session()->put('parent', request()->parent) : null;
        $parent = session('parent');
        if (!is_null($parent)) {
            $subCategories = Category::whereId($parent)->first()->children()->pluck('id');
            $ads = Ad::whereIn('category_id', $subCategories)->with('deals','category','brand','user');
            $paidAds = $ads->hasValidDeal()->orderBy('created_at', 'asc')->take(12)->get();
            $elements = $ads->orderBy('created_at', 'asc')->paginate(10);
            return view('frontend.modules.ad.index', compact('elements', 'paidAds'));
        }
        return redirect()->home()->with('warning', trans('message.something_wrong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $element = $this->ad->whereId($id)->first();
//        dispatch(new CreateNewVisitorForAd($element)); // create counter according to sessionId
//        $counter = Visitor::where('ad_id', $element->id)->count();
        $counter = 0;
        return view('frontend.modules.ad.show', compact('element', 'counter'));
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
