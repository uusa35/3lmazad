<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\AdStore;
use App\Jobs\CreateNewVisitorForAd;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Deal;
use App\Models\Option;
use App\Models\Plan;
use App\Models\Visitor;
use App\Scopes\ScopeAdHasMeta;
use App\Scopes\ScopeAdHasValidDeal;
use App\Scopes\ScopeExpired;
use App\Scopes\ScopeIsSold;
use Carbon\Carbon;
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
            $ads = $ads->with('deals', 'category', 'brand', 'user');
            $userFavorites = auth()->check() ? auth()->user()->favorites()->pluck('ad_id')->toArray() : null;
            $paidAds = $ads->hasDealWithPaidPlan()->orderBy('created_at', 'desc')->take(12)->get();
            $elements = $ads->orderBy('created_at', 'desc')->paginate(12);
            dd($paidAds);
            return view('frontend.modules.ad.index', compact('elements', 'paidAds', 'userFavorites', 'element'));
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
        $element = $this->ad->create(
            $request->only('title', 'category_id', 'user_id',
                'price', 'area_id', 'brand_id', 'model_id', 'type_id', 'color_id', 'size_id')
        );

        if (!$element) {
            return redirect()->route('account.user')->with('error', trans('message.error_ad_store'));
        }

        // observer shall create new deal for the new ad.
        $element->meta()->create(
            $request->only('mobile', 'is_new', 'is_automatic', 'manufacturing_year', 'description',
                'mileage', 'room_no', 'floor_no', 'bathroom_no', 'rent_type', 'building_age',
                'is_furnished', 'space', 'address')
        );

        $this->saveMimes($element, $request, ['image'], ['600', '450'], false);
        if ($request->hasFile('images')) {
            $this->saveGallery($element->gallery()->first(), $request, ['images'], ['600', '450'], false);
        }

        return redirect()->route('account.user')->with('success', trans('message.success_ad_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = $this->ad->whereId($id)->with('category', 'color', 'size', 'brand', 'model', 'gallery.images', 'type', 'area')->with(['comments' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])->with(['auctions' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])->first();
        if (is_null($element)) {
            abort(404, trans('message.ad_missing_our_terms_and_conditions'));
        }
        dispatch(new CreateNewVisitorForAd($element)); // create counter according to sessionId
        $counter = Visitor::where('ad_id', $element->id)->count();
        $element->isOwner ? session()->put('pay_ad_id', $element->id) : null;
        $paidAds = $this->ad->where('category_id', $element->category_id)->hasDealWithPaidPlan()->orderBy('created_at', 'asc')->take(12)->get();
        return view('frontend.modules.ad.show', compact('element', 'counter', 'paidAds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Ad::withoutGlobalScopes([ScopeIsSold::class, ScopeAdHasValidDeal::class])->whereId($id)->first();
        return view('frontend.modules.ad.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdStore $request, $id)
    {
        $element = Ad::whereId($id)->first();

        $updated = $element->update(
            $request->only('title', 'category_id', 'user_id',
                'price', 'area_id', 'brand_id', 'model_id', 'type_id', 'color_id', 'size_id')
        );

        if (!$updated) {
            return redirect()->route('account.user')->with('error', trans('message.error_ad_store'));
        }

        // observer shall create new deal for the new ad.
        $element->meta()->create(
            $request->only('mobile', 'is_new', 'is_automatic', 'manufacturing_year', 'description',
                'mileage', 'room_no', 'floor_no', 'bathroom_no', 'rent_type', 'building_age',
                'is_furnished', 'space', 'address')
        );

        $this->saveMimes($element, $request, ['image'], ['600', '450'], false);
        if ($request->hasFile('images')) {
            if ($element->gallery->first()->images->count() >= env('MAX_IMAGES')) {
                return redirect()->route('account.user')->with('error', trans('message.gallery_update_max_images_reached'));
            };
            $this->saveGallery($element->gallery()->first(), $request, ['images'], ['600', '450'], false);
        }
        return redirect()->route('account.user')->with('success', trans('message.success_ad_store'));
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
        $element = $this->ad->whereId($id)->first();
        $element->update(['active' => !$element->active]);
        return redirect()->back()->with('success', trans('message.process_success'));
    }

    public function toggleFeatured($id)
    {
        $element = $this->ad->whereId($id)->first();
        $element->update(['featured' => !$element->featured]);
        return redirect()->back()->with('success', trans('message.process_success'));
    }

    public function getToggleRepublish($id)
    {
        $element = $this->ad->withoutGlobalScopes()->whereId($id)->first();
        $this->authorize('isOwner', $element->user_id);
        session()->put('pay_ad_id', $element->id);
        return redirect()->route('plan.index');
    }
}
