<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = User::where('id', '!=', 1)->whereHas('roles', function ($q) {
            $q->where('name', request()->type);
        })->get();

        return view('backend.modules.user.index', compact('elements'));
    }

    public function activateUser($id)
    {
        $user = User::whereId($id)->update(['active' => true]);
        return redirect()->back()->with('success', 'user activated');
    }

    public function deactivateUser($id)
    {
        $user = User::whereId($id)->update(['active' => false]);
        return redirect()->back()->with('warning', 'user deactivated');
    }

    public function enableFeatured($id)
    {
        $user = User::whereId($id)->update(['featured' => true]);
        return redirect()->back()->with('success', 'user is featured now');
    }

    public function disableFeatured($id)
    {
        $user = User::whereId($id)->update(['featured' => false]);
        return redirect()->back()->with('warning', 'user is not featured now');
    }

}
