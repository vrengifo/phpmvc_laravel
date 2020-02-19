<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

/**
 * Middleware Admin
 */
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
        // if not authenticated or not user is_admin
        if(!\Auth::check() || !\Auth::user()->is_admin) {
            // message
            session()->flash('error','You must be the admin user to see that resource');
            // redirect
            return redirect('/posts');
        }
        // go to the original request
        return $next($request);
    }
}
