<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Service::where('menu_id', request()->menu_id)->get();
        return view('frontend.modules.service.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.modules.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Service::create($request->request->all());
        if ($element) {
            $this->saveMimes($element, $request, ['image'], ['300', '300'], false);
            return redirect()->route('account.service.index')->with('success', trans('message.service_created_successfully'));
        }
        return redirect()->route('account.service.index')->with('error', trans('message.service_created_failure'));
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
        $element = Service::whereId($id)->first();
        return view('frontend.modules.service.edit', compact('element'));
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
        $element = Service::whereId($id)->update($request->request->all());
        if ($element) {
            if ($request->hasFile('image')) {
                $this->saveMimes($element, $request, ['image'], ['300', '300'], false);
            }
            return redirect()->route('account.service.index')->with('success', trans('message.service_edit_successfully'));
        }
        return redirect()->route('account.service.index')->with('error', trans('message.service_edit_failure'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Service::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('account.service.index')->with('success', trans('message.service_delete_successfully'));
        }
        return redirect()->route('account.service.index')->with('error', trans('message.service_delete_failure'));
    }
}
