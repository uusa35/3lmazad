<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = BrandModel::with('brand')->get();
        return view('backend.modules.model.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('backend.modules.model.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = BrandModel::create($request->request->all());
        if ($element) {
            $this->saveMimes($element, $request, ['image'], ['200', '200'], false);
            return redirect()->route('backend.model.index')->with('success', 'success');
        }
        return redirect()->route('backend.model.create')->with('error', 'failure');
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
        $element = BrandModel::whereId($id)->with('brand')->first();
        $brands = Brand::all();
        return view('backend.modules.model.edit', compact('element','brands'));
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
        $element = BrandModel::whereId($id)->first();
        if ($element->update($request->except('_token','_method'))) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['200', '200'], false);
            }
            return redirect()->route('backend.model.index')->with('success', 'success');
        }
        return redirect()->route('backend.model.edit', $element->id)->with('error', 'failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = BrandModel::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.model.index')->with('success', 'success');
        }
        return redirect()->route('backend.model.index')->with('error', 'failure');
    }
}
