<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasPlan
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

        if(Auth::user()->plan == 'has_plan' || Auth::user()->plan == 'admin'){
            return $next($request);
        }
        return redirect('/home')->with('error', 'Courses are only available to enrolled users.');

        
        
    }
}