<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Brand::with('models', 'category')->get();
        return view('backend.modules.brand.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Brand::create($request->request->all());
        if ($element) {
            $this->saveMimes($element, $request, ['image'], ['200', '200'], false);
            return redirect()->route('backend.brand.index')->with('success', 'success');
        }
        return redirect()->route('backend.brand.create')->with('error', 'failure');
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
        $element = Brand::whereId($id)->first();
        return view('backend.modules.brand.edit', compact('element'));
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
        $element = Brand::whereId($id)->first();
        if ($element->update($request->except('_token', '_method'))) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['200', '200'], false);
            }
            return redirect()->route('backend.brand.index')->with('success', 'success');
        }
        return redirect()->route('backend.brand.edit', $element->id)->with('error', 'failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Brand::whereId($id)->first();
        if ($element->ads->isEmpty()) {
            $element->models()->delete();
            $element->delete();
            return redirect()->route('backend.brand.index')->with('success', 'Deleted successfully');
        } else {
            return redirect()->route('backend.brand.index')->with('error', 'You can not delete this brand because there are ads attached to.!!!');
        }
    }
}
