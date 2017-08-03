<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\UserUpdate;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Deal;
use App\Models\Role;
use App\Models\User;
use App\Scopes\ScopeAdHasValidDeal;
use App\Scopes\ScopeExpired;
use App\Scopes\ScopeIsSold;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $ad;
    public $user;
    public $category;

    public function __construct(Ad $ad, User $user, Category $category)
    {
        $this->ad = $ad;
        $this->user = $user;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = $this->category->whereId(request()->id)->first();
        $elements = $element->users()->featured()->merchants()->orderBy('area_id', 'asc')->get();
        return view('frontend.modules.user.index', compact('element', 'elements'));
    }

    public function merchantsCategories()
    {
        $elements = $this->category->where('parent_id', 0)->whereHas('users', function ($q) {
            return $q->where('featured', true)->whereHas('roles', function ($q) {
                return $q->where('name', 'merchant');
            });
        })->get();
        return view('frontend.modules.user.merchants-categories', compact('elements'));
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
        $element = $this->user->whereId($id)->with('gallery.images')->first();
        $elements = $element->ads()->with('deals', 'category', 'brand', 'user', 'color', 'size', 'favorites')->paginate(10);
        return view('frontend.modules.user.show', compact('element', 'elements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = auth()->user();
        $this->authorize('isOwner', $element->id);
        return view('frontend.modules.user.edit', compact('element', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $user = auth()->user();
        $updated = $user->update($request->except('is_merchant'));
        if ($request->is_merchant) {
            $role = Role::where('name', 'merchant')->first();
            $user->roles()->sync($role->id);
        } else {
            $role = Role::where('name', 'user')->first();
            $user->roles()->sync($role->id);
        }
        if ($updated) {
            if ($request->hasFile('avatar')) {
                $this->saveMimes($user,
                    $request,
                    ['avatar'],
                    ['500', '500'],
                    false);
            }
            return redirect()->route('account.user')->with('success', trans('general.user_update_success'));
        }
        return redirect()->route('account.user')->with('error', trans('general.user_update_failure'));
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * used to show all the CMS for frontend user
     */
    public function account()
    {
        $element = $this->user->whereId(auth()->user()->id)->with('gallery.images')->first();
        return view('frontend.modules.user.account', compact('element'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * used to get all the filtered ads of merchants
     */
    public function ads($id)
    {
        $element = $this->user->whereId($id)->with('ads')->first();
        $elements = $element->ads()->paginate(12);
        return view('frontend.modules.user.ads', compact('element', 'elements'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * used to get all the unfiltered ads of any type of user
     */
    public function adsList()
    {
        $elements = Ad::withoutGlobalScopes([ScopeIsSold::class, ScopeAdHasValidDeal::class])
            ->where('user_id', auth()->user()->id)
            ->with(['category', 'meta','deals' => function ($q) {
                return $q->withoutGlobalScopes();
            }])
            ->get();
        return view('frontend.modules.user.ads-list', compact('elements'));
    }

}
