<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = City::with('area')->get();
        return view('backend.modules.city.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name_ar','id')->toArray();
        return view('backend.modules.city.create',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = City::create($request->all());
        if ($element) {
            return redirect()->route('backend.city.index')->with('success', 'process success');
        }
        return redirect()->route('backend.city.index')->with('error', 'process failure');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = City::whereId($id)->first();
        $areas = Area::pluck('name_ar','id')->toArray();
        return view('backend.modules.city.edit', compact('element','areas'));
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
        $element = City::whereId($id)->first();
        if ($element->update($request->request->all())) {
            return redirect()->route('backend.city.index')->with('success', 'process success');
        }
        return redirect()->route('backend.city.edit', $id)->with('error', 'process failure');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = City::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.city.index')->with('success', 'process success');
        }
        return redirect()->route('backend.city.index')->with('error', 'process failure');
    }
}
