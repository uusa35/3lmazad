<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\AdStore;
use App\Jobs\CreateNewVisitorForAd;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Option;
use App\Models\Plan;
use App\Models\Visitor;
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
            $ads = $ads->with('deals', 'category', 'brand', 'user', 'color', 'size', 'favorites');
            $userFavorites = auth()->check() ? auth()->user()->favorites()->pluck('ad_id')->toArray() : null;
            $paidAds = $ads->hasValidDeal()->orderBy('created_at', 'asc')->take(12)->get();
            $elements = $ads->orderBy('created_at', 'asc')->paginate(12);
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
        $element = $this->ad->create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'area_id' => $request->area_id,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'type_id' => $request->type_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'start_date' => Carbon::today(),
            'end_date' => Carbon::now()->addDays(Plan::where('is_free', true)->first()->duration)
        ]);

        $meta = $element->meta()->create([
            'mobile' => $request->mobile,
            'is_new' => $request->is_new,
            'is_automatic' => $request->is_automatic,
            'manufacturing_year' => $request->manufacturing_year,
            'mileage' => $request->mileage,
            'room_no' => $request->room_no,
            'floor_no' => $request->floor_no,
            'bathroom_no' => $request->bathroom_no,
            'rent_type' => $request->rent_type,
            'building_age' => $request->building_age,
            'is_furnished' => $request->furnished,
            'space' => $request->space,
            'address' => $request->address
        ]);

        if (!$element) {
            return redirect()->route('account')->with('error', trans('message.error_ad_store'));
        }
        $this->saveMimes($element, $request, ['image'], ['600', '450'], false);
        $this->saveGallery($element, $request, ['images'], ['600', '450'], false);

        return redirect()->route('account')->with('success', trans('message.success_ad_store'));
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
        $paidAds = $this->ad->where('category_id', $element->category_id)->hasPaidPlans()->orderBy('created_at', 'asc')->take(12)->get();
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
