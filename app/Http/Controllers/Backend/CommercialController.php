<?php

namespace App\Http\Controllers\Backend;

use App\Models\Commercial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Commercial::all();
        return view('backend.modules.commercial.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.commercial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Commercial::create($request->request->all());
        if ($element) {
            $this->saveMimes($element, $request, ['image'], ['300', '300'], false);
            return redirect()->route('backend.commercial.index')->with('success', 'process success');
        }
        return redirect()->route('backend.commercial.index')->with('error', 'process failure');
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
        $element = Commercial::whereId($id)->first();
        return view('backend.modules.commercial.edit', compact('element'));
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
        $element = Commercial::whereId($id)->first();
        $element->update($request->except('_method', '_token'));

        if ($request->hasFile('image')) {
            $this->saveMimes($element, $request, ['image'], ['300', '300'], false);
        }

        return redirect()->route('backend.commercial.index')->with('success', 'process success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Commercial::whereId($id)->delete();
        if ($element) {
            return redirect()->route('backend.commercial.index')->with('success', 'process success');
        }
        return redirect()->route('backend.commercial.index')->with('error', 'process failure');
    }
}
