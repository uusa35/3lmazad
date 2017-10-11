<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Menu::where('user_id',auth()->user()->id)->with('user','services')->get();
        return view('frontend.modules.menu.index',compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.modules.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Menu::create($request->all());
        if($element) {
            return redirect()->route('account.menu.index')->with('success',trans('message.menu_create_success'));
        }
        return redirect()->route('account.menu.index')->with('error',trans('message.menu_create_failure'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Menu::whereId($id)->first();
        return view('frontend.modules.menu.edit',compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element = Menu::whereId($id)->first();
        $element->update($request->all());
        return redirect()->route('account.menu.index')->with('success',trans('message.menu_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Menu::whereId($id)->first();
        if($element) {
            $element->services()->delete();
            $element->delete();
            return redirect()->route('account.menu.index')->with('success',trans('message.menu_delete_success'));
        }
        return redirect()->route('account.menu.index')->with('error',trans('message.menu_delete_failure'));
    }
}
