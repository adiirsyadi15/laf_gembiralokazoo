<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\TOAuth;

use App\Admin;

class Authenticate
{
    


    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }



        // 2 Lini dibawah hasil oprek, buat ngisi role di session
        $role = Auth::user()->role;
        $username = Auth::user()->username;

        session(['role'=>$role]);
        session(['username'=>$username]);

        
        return $next($request);
    }
}
