<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WhiteColours
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
        if ( Auth::check() )
        {
            if (Auth::user()->range < \App\User::max('range')) {
                $name ="pranas";
        return $next($request, $name);

            }
        }
        return redirect('/exit');

    }
}
