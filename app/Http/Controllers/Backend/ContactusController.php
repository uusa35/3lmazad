<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ContactusUpdate;
use App\Models\Contactus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = Contactus::first();
        return view('backend.modules.contactus.index', compact('element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('/contactus');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Contactus::first();

        return view('backend.modules.contactus.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactusUpdate $request, $id)
    {
        $contactus = Contactus::first();

        if (!$contactus->update($request->request->all())) {
            return redirect()->route('backend.contactus.index')->with('error','contactus error');
        }

        $this->saveMimes($contactus, $request, ['logo'], ['200', '70'], false);

        return redirect()->route('backend.contactus.index')->with('success','contactus updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
