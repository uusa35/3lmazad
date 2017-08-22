<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Area::all();
        return view('backend.modules.area.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Area::create($request->all());
        if ($element) {
            return redirect()->route('backend.area.index')->with('success', 'process success');
        }
        return redirect()->route('backend.area.index')->with('error', 'process failure');
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
        $element = Area::whereId($id)->first();
        return view('backend.modules.area.edit', compact('element'));
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
        $element = Area::whereId($id)->first();
        if ($element->update($request->all())) {
            return redirect()->route('backend.area.index')->with('success', 'process success');
        }
        return redirect()->route('backend.area.edit', $id)->with('error', 'process failure');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Area::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.area.index')->with('success', 'process success');
        }
        return redirect()->route('backend.area.index')->with('error', 'process failure');
    }
}
