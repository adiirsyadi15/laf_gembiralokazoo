<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Pemilik
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
        if (session()->has('role')) {
            if (session()->get('role')=="pemilik") {
                return $next($request);   
            }else{
                return redirect('home');     
            }
        }else{
            return redirect('home');            
        }
    }
}
