<?php

namespace App\Http\Middleware;

use Closure;

class VerifyType
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
        if($request->session()->get('SID') == 1){
            return $next($request);
        }
        if($request->session()->get('SID') == 2)
        {
            return $next($request);
        }       
        if($request->session()->get('SID') == 3)
        {
            return $next($request);
        }       
        if($request->session()->get('SID') == 4)
        {
            return $next($request);
        }       
        if($request->session()->get('SID') == 5)
        {
            return $next($request);
        }
        else{
            return redirect('/login');
        }
    }
}
