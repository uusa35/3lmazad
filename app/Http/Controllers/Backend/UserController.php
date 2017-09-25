<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Frontend\UserUpdate;
use App\Models\Role;
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
        $elements = User::withoutGlobalScopes()->where('id', '!=', 1)->whereHas('roles', function ($q) {
            $q->where('name', request()->type);
        })->get();

        return view('backend.modules.user.index', compact('elements'));
    }

    public function activateUser($id)
    {
        $user = User::withoutGlobalScopes()->whereId($id)->update(['active' => true]);
        return redirect()->back()->with('success', 'user activated');
    }

    public function deactivateUser($id)
    {
        $user = User::withoutGlobalScopes()->whereId($id)->update(['active' => false]);
        return redirect()->back()->with('warning', 'user deactivated');
    }

    public function enableFeatured($id)
    {
        $user = User::withoutGlobalScopes()->whereId($id)->update(['featured' => true]);
        return redirect()->back()->with('success', 'user is featured now');
    }

    public function disableFeatured($id)
    {
        $user = User::withoutGobalScopes()->whereId($id)->update(['featured' => false]);
        return redirect()->back()->with('warning', 'user is not featured now');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = User::whereId($id)->first();
        return view('backend.modules.user.edit', compact('element', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $user = User::whereId($id)->first();
        $updated = $user->update($request->except('is_merchant'));
        if ($request->is_merchant) {
            $role = Role::where('name', 'merchant')->first();
            $user->roles()->sync($role->id);
        } else {
            $role = Role::where('name', 'user')->first();
            $user->roles()->sync($role->id);
        }
        if ($updated) {
            if ($request->hasFile('avatar')) {
                $this->saveMimes($user,
                    $request,
                    ['avatar'],
                    ['500', '500'],
                    false);
            }
            return redirect()->route('backend.user.index',['type' => $user->roles->first()->name])->with('success', trans('general.user_update_success'));
        }
        return redirect()->route('backend.user.edit',$id)->with('error', trans('general.user_update_failure'))->withInputs();
    }

}
