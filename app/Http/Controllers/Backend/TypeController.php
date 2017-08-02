<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Type::with('category')->get();
        return view('backend.modules.type.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Type::create($request->all());
        if ($element) {
            return redirect()->route('backend.type.index')->with('success', 'success');
        }
        return redirect()->route('backend.type.create')->with('error', 'failure');
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
        $element = Type::whereId($id)->first();
        return view('backend.modules.type.edit', compact('element'));
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
        $element = Type::whereId($id)->first();
        if ($element->update($request->all())) {
            return redirect()->route('backend.type.index')->with('success', 'success');
        }
        return redirect()->route('backend.type.edit', $element->id)->with('error', 'failure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Type::whereId($id)->first()->delete();
        if ($element) {
            return redirect()->route('backend.type.index')->with('success', 'success');
        }
        return redirect()->route('backend.type.index')->with('error', 'failure');
    }
}
