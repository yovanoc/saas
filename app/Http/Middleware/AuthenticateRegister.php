<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateRegister
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
        if (! auth()->check()) {
            session()->put('url.intended', $request->url());

            return redirect('/register');
        }

        return $next($request);
    }
}
