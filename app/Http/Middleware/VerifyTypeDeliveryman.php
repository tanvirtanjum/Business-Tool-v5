<?php

namespace App\Http\Middleware;

use Closure;

class VerifyTypeDeliveryman
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
        if($request->session()->get('SID') == '4')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login.justify');
        }
    }
}
