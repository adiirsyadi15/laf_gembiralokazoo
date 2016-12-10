<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $users = User::where('username', 'LIKE', '%'.$q.'%')
            ->paginate(5);

        // $users = User::with('petugascall')->where('username', 'LIKE', '%'.$q.'%')->paginate(5);

        // dd($users);
        return view('laf_app_administrator.user.user_akses.index', compact('users', 'q'));

    }

    public function blokir(Request $request, $username)
    {
        $active = $request->input('active');
        // dd('$active');
        if($active == 1 ){
            $active = 0;
        }else{
            $active = 1;
        }

        $user = User::where('username', $username)->first();
        $user->active= $active;
        $user->save();

        \Flash::success('Perubahan Blokir User Sukses');
        return redirect()->route('user.index');

    }

    public function resetpassword(Request $request,$username)
    {
        
        $pass = bcrypt($request->input('pass'));


        $user = User::where('username', $username)->first();
        $user->Password= $pass;
        $user->save();

        \Flash::success('Reset Password '.$username.' Sukses');
        return redirect()->route('user.index');

    }

}