<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Check user role
            switch (Auth::user()->is_admin) {
                case 0:
                    return redirect('userhome');
                    break;
                case 1:
                    return redirect('adminhome');
                    break;
                default:
                    return redirect('login');
                    break;
            }
        }
        // if (Auth::guard($guard)->check()) {
        //     // Check user role
        //     switch (Auth::user()->is_admin) {
        //         case 0:
        //             return redirect('userhome');
        //             break;
        //         case 1:
        //             return redirect('adminhome');
        //             break;
        //         default:
        //             return redirect('login');
        //             break;
        //     }
        // }

        return $next($request);
    }
}
