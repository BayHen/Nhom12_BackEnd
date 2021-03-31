<?php

namespace App\Http\Middleware;

use Closure;

class CheckPass
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
        if($request->query('name') != "admin" || $request->query('pass') != "123"){
            return redirect('/login');
        }
        return $next($request);
    }
}
