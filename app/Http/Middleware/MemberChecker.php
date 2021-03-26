<?php

namespace App\Http\Middleware;

use Closure;

class MemberChecker
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
        #User
        if(Auth()->check()){
            return $next($request);
        }
        #Other
        return back();
    }
}
