<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }
        if (auth()->check()) {
            return redirect()->route('guest.index');
        }

        return redirect()->route('login');
    }
}
