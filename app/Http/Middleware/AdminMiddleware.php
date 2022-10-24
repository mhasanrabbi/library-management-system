<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request, $next);

        if (Auth::check()) {
            // admin role ==1
            if (Auth::user()->role == '1') {
                // dd($request, Auth::user()->role);
                return $next($request);
            } else {
                // return redirect('/home')->with('message', 'You are not allowed to access this page.');
                return redirect('/home');
            }
        } else {
            return redirect('/login')->with('message', 'You are not allowed please login first.');
        }
        return $next($request);
    }
}

// if ( Auth()->check() and Auth()->user()->role == 0 ) { // user is logged in but it is blocked
//     auth()->logout();
//     return redirect( '/' );
// }

// return $next( $request );