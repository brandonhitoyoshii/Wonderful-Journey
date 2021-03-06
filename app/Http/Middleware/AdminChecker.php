<?php

namespace App\Http\Middleware;

use Closure;

class AdminChecker
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
        #Admin
        if(Auth()->check() && Auth()->user()->role == 'admin'){
            return $next($request);    
        }
        #Other
        return redirect('/home');
    }
}
