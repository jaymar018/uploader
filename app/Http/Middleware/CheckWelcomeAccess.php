<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWelcomeAccess
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
        if ($request->session()->has('seen_welcome_page')) {
            
            // User has already seen the welcome page, redirect to a different page
            return $next($request);
        } 

        return redirect('/admin/login');
    
    }
}
