<?php

namespace App\Http\Middleware;

use Closure;

class VerifyTypeSalesman
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
        if($request->session()->get('SID') == '3')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login.justify');
        }
    }
}
