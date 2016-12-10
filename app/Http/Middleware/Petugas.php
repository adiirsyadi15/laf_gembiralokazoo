<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Petugas
{
    public function handle($request, Closure $next)
    {


        if (session()->has('role')) {
            if (session()->get('role')=="petugas") {
                return $next($request);   
            }else{
                return redirect('/home');     
            }
        }else{
            return redirect('/home2');            
        }
    }
}
