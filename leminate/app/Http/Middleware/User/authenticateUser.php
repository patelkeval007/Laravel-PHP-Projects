<?php

namespace App\Http\Middleware\User;

use Closure;

class authenticateUser
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
        if(auth()->user()->is_admin == 0){
            return $next($request);
        }
        return redirect('login')->with('error','You have not user access');
    }
}
