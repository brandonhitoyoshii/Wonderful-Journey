<?php

namespace App\Http\Middleware;

use Closure;

class GuestOnly
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
        #Member
        if(Auth()->check()){
            return back();
        }
        #Guest
        return $next($request);
    }
}
