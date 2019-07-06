<?php

namespace App\Http\Middleware\Admin;

use Closure;

class authenticateAdmin
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
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        return redirect('login')->with('error','You have not admin access');
    }
}
