<?php

namespace App\Http\Controllers\Backend;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Field::with('options')->orderBy('created_at', 'desc')->get();
        return view('backend.modules.field.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404', 'error occured');
        return view('backend.modules.field.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Field::create($request->all());
        if ($element) {
            return redirect()->route('backend.field.index')->with('success', 'success !!');
        }
        return redirect()->route('backend.field.create')->with('error', 'failure !!');
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
        $element = Field::whereId($id)->first();
        return view('backend.modules.field.edit', compact('element'));
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
        $element = Field::whereId($id)->first();
        $element->update($request->all());
        !$request->has('is_modal') ? $element->update(['is_model' => 0]) : null;
        if ($element) {
            return redirect()->route('backend.field.index')->with('success', 'saved !!');
        }
        return redirect()->route('backend.field.edit')->with('error', 'not saved !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
