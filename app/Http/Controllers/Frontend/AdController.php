<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\AdStore;
use App\Jobs\CreateNewVisitorForAd;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public $ad;
    public $category;

    public function __construct(Ad $ad, Category $category)
    {
        $this->ad = $ad;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if the parent id is there go ahead and make the session
        $cat = request()->id;
        if (!is_null($cat)) {
            $category = $this->category->whereId($cat)->first();
            if ($category->isParent) {
                $subCategories = $this->category->whereId($cat)->first()->children()->pluck('id');
                $ads = $this->ad->whereIn('category_id', $subCategories);
            } else {
                $ads = $this->ad->where('category_id', $cat);
            }
            $ads = $ads->with('deals', 'category', 'brand', 'user', 'color', 'size', 'favorites');
            $userFavorites = auth()->check() ? auth()->user()->favorites()->pluck('ad_id')->toArray() : null;
            $paidAds = $ads->hasValidDeal()->orderBy('created_at', 'asc')->take(12)->get();
            $elements = $ads->orderBy('created_at', 'asc')->paginate(12);
            return view('frontend.modules.ad.index', compact('elements', 'paidAds', 'userFavorites','category'));
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
        return view('frontend.modules.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStore $request)
    {
        $element = $this->ad->create($request->except('image'));

        if (!$element) {
            return redirect()->route('account')->with('error', 'not stored successfully');
        }
        $this->saveMimes($element, $request, ['image'], ['1920', '745'], false);


        return redirect()->route('account')->with('success', title_case('item saved successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = $this->ad->whereId($id)->with('user', 'meta', 'category',
            'color', 'size', 'brand', 'model', 'gallery.images', 'type', 'area')->with(['comments' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])->with(['auctions' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])->first();
        /*dispatch(new CreateNewVisitorForAd($element)); // create counter according to sessionId
        $counter = Visitor::where('ad_id', $element->id)->count();*/
        $counter = 0;
        $element->isOwner ? session()->put('pay_ad_id', $element->id) : null;
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
        $element = $this->ad->whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('user.account.ads')->with('success', trans('message.delete_success'));
        }
        return redirect()->route('user.account.ads')->with('error', trans('message.delete_failure'));
    }

    public function toggleActivate($id)
    {
        $ad = $this->ad->whereId($id)->first();
        $ad->update(['active' => !$ad->active]);
        return redirect()->back()->with('success', trans('message.process_success'));
    }

    public function toggleFeatured($id)
    {
        $ad = $this->ad->whereId($id)->first();
        $ad->update(['featured' => !$ad->featured]);
        return redirect()->back()->with('success', trans('message.process_success'));
    }
}
