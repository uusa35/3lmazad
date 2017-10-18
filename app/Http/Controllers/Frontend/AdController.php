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
            $element = $this->category->whereId($cat)->first();
            if ($element->isParent) {
                $cat = $this->category->whereId($cat)->first()->children()->pluck('id');
            } else {
                $cat = [$cat];
            }
            $elements = $this->ad->whereIn('category_id', $cat)->with('meta', 'category', 'brand')->orderBy('created_at', 'desc')->paginate(12);
            $paidAds = $this->ad->whereIn('category_id', $cat)->hasDealWithPaidPlan()->with('meta', 'category', 'brand')->orderBy('created_at', 'desc')->take(12)->get();
            $userFavorites = auth()->check() ? auth()->user()->favorites()->pluck('ad_id')->toArray() : null;
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
        if ($request->is_paid) {
            session()->put('pay_ad_id', $element->id);
            return redirect()->route('plan.index');
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
        $element = $this->ad->whereId($id)->with(['comments' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])->with(['auctions' => function ($q) {
            $q->with('user')->orderBy('created_at', 'desc')->take(15);
        }])
//            ->with('category', 'color', 'size', 'brand', 'model', 'gallery.images', 'type', 'area')
            ->first();
        if (is_null($element)) {
            abort(404, trans('message.ad_missing_our_terms_and_conditions'));
        }
        dispatch(new CreateNewVisitorForAd($element)); // create counter according to sessionId
        $counter = Visitor::where('ad_id', $element->id)->count();
        $element->isOwner ? session()->put('pay_product_id', $element->id) : session()->forget('pay_product_id');
        $paidAds = $this->ad->where('category_id', $element->category_id)->adHasValidPaidDeal()->orderBy('created_at', 'desc')->take(12)->get();
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

    public function toggleBooked($id)
    {
        $element = $this->ad->whereId($id)->first();
        $element->update(['booked' => !$element->booked]);
        return redirect()->back()->with('success', trans('message.process_success'));
    }

    public function getRepublishFree($id)
    {
        $element = $this->ad->withoutGlobalScopes()->whereId($id)->first();
        $this->authorize('isOwner', $element->user_id);
        // for now i will just renew the deal that already expired
        $deal = $element->deals()->withoutGlobalScopes()->first();
        $plan = Plan::where('is_paid', false)->first();
        $deal->update(['plan_id', $plan->id, 'valid' => true, 'end_date' => Carbon::now()->addDays($plan->duration)]);
        return redirect()->route('account.user.ads')->with('success', trans('message.republish_success'));
//        session()->put('pay_product_id', $element->id);
//        return redirect()->route('plan.index');
    }

    public function postRepublishFree(Request $request)
    {
        $ad = $this->ad->withoutGlobalScopes()->whereId($request->product_id)->first();
        // get all deals related to the ad withoutglobalscopes
        $deals = $ad->deals()->withoutGlobalScopes()->get();
        // if there are more than one deal then delete all .. create new free one
        if ($deals->isEmpty()) {
            $deals->withoutGlobalScopes()->delete();
            Deal::create([
                'start_date' => Carbon::today(),
                'end_date' => Carbon::now()->addDays(Plan::where('is_paid', false)->first()->duration),
                'plan_id' => Plan::where('is_paid', false)->first()->id,
                'valid' => true
            ]);
        } else {
            // if there is only one then update it
            $deal = Deal::withoutGlobalScopes()->where('ad_id', $request->product_id)->first();
            $deal->update([
                'start_date' => Carbon::today(),
                'end_date' => Carbon::now()->addDays(Plan::where('is_paid', false)->first()->duration),
                'plan_id' => Plan::where('is_paid', false)->first()->id,
                'valid' => true
            ]);
        }
        return redirect()->home()->with('success', trans('message.ad_republished_successfully'));

    }
}
