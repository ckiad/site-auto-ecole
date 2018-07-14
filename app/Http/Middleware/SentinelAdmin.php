<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;

class SentinelAdmin
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
        if(!Sentinel::check())
            return Redirect::to('login')->with('info', 'Vous devez vous connecter !');
        elseif(!Sentinel::inRole('admin'))
            return Redirect::to('admin/account_user'); //account_user
        return $next($request);
    }
}
