<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Size::all();
        return view('backend.modules.size.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Size::create($request->all());
        if ($element) {
            return redirect()->route('backend.size.index')->with('success', 'success');
        }
        return redirect()->route('backend.size.create')->with('error', 'failure');
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
        $element = Size::whereId($id)->first();
        return view('backend.modules.size.edit', compact('element'));
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
        $element = Size::whereId($id)->first();
        if ($element->update($request->all())) {
            return redirect()->route('backend.size.index')->with('success', 'success');
        }
        return redirect()->route('backend.size.edit', $element->id)->with('error', 'failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Size::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.size.index')->with('success', 'success');
        }
        return redirect()->route('backend.size.index')->with('error', 'failure');
    }
}
