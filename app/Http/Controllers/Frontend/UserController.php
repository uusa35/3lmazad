<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\UserUpdate;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public $ad;
    public $user;

    public function __construct(Ad $ad, User $user)
    {
        $this->ad = $ad;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = $this->user->merchants()->with('ads')->paginate(12);
        return view('frontend.modules.user.index', compact('elements'));
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
        $element = $this->user->whereId($id)->first();
        $elements = $element->ads()->with('deals', 'category', 'brand', 'user', 'color', 'size', 'favorites')->paginate(10);
        return view('frontend.modules.user.show', compact('element','elements'));
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
        $updated = $user->update($request->request->all());
        if ($updated) {
            if ($request->hasFile('avatar')) {
                $this->saveMimes($user->user_meta()->first(),
                    $request,
                    ['avatar'],
                    ['500', '500'],
                    false);
            }
            return redirect()->route('user.index')->with('success', trans('general.user_update_success'));
        }
        return redirect()->route('user.index')->with('error', trans('general.user_update_failure'));
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
        $element = auth()->user();
        return view('frontend.modules.user.account', compact('element'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * used to get all the filtered ads of merchants
     */
    public function ads($id)
    {
        $element = $this->user->whereId($id)->first();
        $elements = $element->ads()->with('deals', 'category', 'brand', 'user', 'color', 'size', 'favorites')->paginate(12);
        return view('frontend.modules.user.profile', compact('element','elements'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * used to get all the unfiltered ads of any type of user
     */
    public function myads()
    {
        $elements = auth()->user()->ads()->withoutGlobalScopes()->withoutTrashed()->with('category', 'meta')->get();
        return view('frontend.modules.user.ads-list', compact('elements'));
    }

    public function toggleRepublish($id)
    {
        $ad = $this->ad->whereId($id)->first();
        $this->authorize('isOwner', $ad->user_id);
    }
}
