<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {   
        if($this->auth->check()){
            $role = Auth::user()->role;

            $path = ($role == "admin") ? 'admin/home' : 'tenant/home';
            
            return redirect($path);
        }
        return $next($request);
    }
}
