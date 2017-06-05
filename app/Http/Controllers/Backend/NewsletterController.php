<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\NewsletterSendCampaign;
use App\Http\Requests\Backend\NewsletterStore;
use App\Http\Requests\Backend\NewsletterUpdate;
use App\Mail\NewsLetterCampaign;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;

class NewsletterController extends Controller
{
    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Newsletter::all();
        return view('backend.modules.newsletter.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterStore $request)
    {
        Newsletter::create($request->all());

        return redirect()->route('backend.newsletter.index')->with('success', 'subscriber created');
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
        $subscriber = Newsletter::whereId($id)->first();

        return view('backend.modules.newsletter.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsletterUpdate $request, $id)
    {
        $subscriber = Newsletter::whereId($id)->first()->update($request->all());

        return redirect()->route('backend.newsletter.index')->with('success', 'subscriber updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Newsletter::whereId($id)->first();

        $subscriber->delete();

        return redirect()->route('backend.newsletter.index')->with('success', 'subscriber deleted');
    }

    public function getCreateCampaign()
    {
        return view('backend.modules.newsletter.campaign');
    }

    /**
     * @param NewsletterSendCampaign $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateCampaign(NewsletterSendCampaign $request)
    {
        $subscribers = Newsletter::where('active', true)->get();

        foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)
                ->queue(new NewsLetterCampaign($subscriber, $request->title, $request->body));

        }

        return redirect()->route('backend.newsletter.index')->with('success', 'campaign sent successfully to all subscribers');
    }
}
