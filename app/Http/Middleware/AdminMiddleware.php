<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Auth;

class AdminMiddleware
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
       
        if(Auth::getUser()->roles()->first()->name=='admin'){
            return $next($request);
        }
        else{
             return response()->view('errors.401', [], 401);
            }
    }
}
