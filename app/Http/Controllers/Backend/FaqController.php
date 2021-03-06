<?php

namespace App\Http\Controllers\Backend;

use App\Models\Aboutus;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Faq::all();
        return view('backend.modules.faq.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = Faq::create($request->request->all());

        if (!$faq) {
            return redirect()->route('backend.faq.index')->with('error', 'not created successfully');
        }

        return redirect()->route('backend.faq.index')->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->to('/faq');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Faq::whereId($id)->first();

        return view('backend.modules.faq.edit', compact('element'));
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
        $faq = Faq::whereId($id)->first();

        if (!$faq->update($request->request->all())) {
            return redirect()->route('backend.faq.index')->with('error', 'not updated successfully');
        }

        return redirect()->route('backend.faq.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::whereId($id)->first();
        if($faq->delete()) {
            return redirect()->route('backend.faq.index')->with('success', 'updated successfully');
        }
        return redirect()->route('backend.faq.index')->with('error', 'not updated successfully');
    }
}
