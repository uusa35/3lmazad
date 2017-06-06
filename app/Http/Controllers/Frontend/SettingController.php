<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return 'setting view';
    }

    public function toggleMobile()
    {
        auth()->user()->update([
            'is_mobile_visible' => !auth()->user()->is_mobile_visible
        ]);
        return redirect()->back()->with('success', trans('message.saved_successfully'));
    }

    public function toggleEmail()
    {
        auth()->user()->update([
            'is_email_visible' => !auth()->user()->is_email_visible
        ]);
        return redirect()->back()->with('success', trans('message.saved_successfully'));
    }
}
