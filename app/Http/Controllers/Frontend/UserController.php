<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = auth()->user();
        $this->authorize('isOwner', $element->id);
        return view('frontend.modules.user.index', compact('element'));
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
        $user = auth()->user();
        $userFavorites = auth()->user()->ads()->pluck('id')->toArray();
        $elements = $user->favorites()->paginate(12);
        return view('frontend.modules.user.show', compact('elements', 'userFavorites'));
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
}
