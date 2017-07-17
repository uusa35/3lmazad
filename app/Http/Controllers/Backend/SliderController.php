<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SliderStore;
use App\Http\Requests\Backend\SliderUpdate;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Slider::all();

        return view('backend.modules.slider.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderStore $request)
    {
        $slider = Slider::create($request->request->all());
        if (!$slider) {
            return redirect()->route('backend.slider.index')->with('error', 'slide not created successfully');
        }
        $this->saveMimes($slider, $request, ['image'], ['590', '450'], true);

        return redirect()->route('backend.slider.index')->with('success', 'slide created successfully');
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
        $element = Slider::whereId($id)->first();

        return view('backend.modules.slider.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdate $request, $id)
    {

        $slider = Slider::whereId($id)->first();

        if (!$slider->update($request->request->all())) {
            return redirect()->route('backend.slider.index')->with('error', 'slide not created successfully');
        }

        $this->saveMimes($slider, $request, ['image'], ['590', '450'], false);

        return redirect()->route('backend.slider.index')->with('success', 'slide created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::whereId($id)->first()->delete();

        if (!$slider) {

            return redirect()->route('backend.slider.index')->with('error', 'slide not deleted successfully');

        }

        return redirect()->route('backend.slider.index')->with('success', 'slider deleted');

    }
}
