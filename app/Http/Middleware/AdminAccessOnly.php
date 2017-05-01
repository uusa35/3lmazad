<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccessOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(!auth()->user()->isAdmin, '404', 'Admin zone only !!!');
        return $next($request);
    }
}
