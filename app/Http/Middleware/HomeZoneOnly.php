<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class HomeZoneOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(request()->route()->getName() === 'home') {
            return $next($request);
        }
//        return redirect()->back()->with('warning','site is under construction');
        return abort(404,trans('general.under_construction'));

    }
}
