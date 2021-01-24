<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
        return Auth::check() ? Auth::User()->roles == 'Admin'  ? $next($request) : $this->noAccess($request) : redirect('/login');
    }

    private function noAccess($request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
