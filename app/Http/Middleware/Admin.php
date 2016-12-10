<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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


        //  $role = Auth::user()->role;
        // $username = Auth::user()->username;
        // session(['role'=>$role]);
        // session(['username'=>$username]);


        if (session()->has('role')) {
            if (session()->get('role')=="admin") {
                return $next($request);   
            }else{
                return redirect('home');     
            }
        }else{
            return redirect('hom12');            
        }
    }
}
