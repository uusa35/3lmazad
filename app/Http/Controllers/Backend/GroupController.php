<?php

namespace App\Http\Controllers\Backend;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Group::all();
        return view('backend.modules.group.index',compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Group::create($request->all());
        if ($element) {
            return redirect()->route('backend.group.index')->with('success', 'process success');
        }
        return redirect()->route('backend.group.index')->with('error', 'process failure');
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
        $element = Group::whereId($id)->first();
        return view('backend.modules.group.edit', compact('element'));
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
        $element = Group::whereId($id)->first();
        if ($element->update($request->all())) {
            return redirect()->route('backend.group.index')->with('success', 'process success');
        }
        return redirect()->route('backend.group.edit', $id)->with('error', 'process failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Group::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.group.index')->with('success', 'process success');
        }
        return redirect()->route('backend.group.index')->with('error', 'process failure');
    }
}
