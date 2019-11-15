<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth;

class isadmin
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

         dd(Auth::user()->id);
         return "kkk";
         die;
        return $next($request);
    }
}
