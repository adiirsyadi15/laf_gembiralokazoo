<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Pemilik;

class AuthController extends Controller
{

    //definisi form yang di ambil
    protected $username = 'username';

    // protected $redirectTo = '/admin';
    protected $redirectAfterLogout = '/login';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
         $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    
    }

    //validasi inputan
    // protected function loginValidation($request)
    // {
    //     $rules = array(
    //       'username' => 'required|max:255',
    //       'password'   => 'required|min:6',
    // );
    //     $this->validate( $request , $rules);
    // }

    public function login(LoginRequest $request)
         {
         
           $credentials = $request->only('username', 'password');
           if(Auth::attempt($credentials)){
         
             if (Auth::user()->active == 0) {
         
               Auth::logout();

              \Flash::error('Login Gagal, Rubah status blokir untuk login');
               return view('auth.login');
             }
             else{
                // redirek setelah validasi login
                // dikirim sesuai hak akses
                if (Auth::user()->role =="admin") {
                    return redirect('admin');
                }elseif (Auth::user()->role =="petugas") {
                    return redirect('petugas');
                }else{
                    return redirect('/');     
                }
             }
           }
           else{
            \Flash::error('Login Gagal, Username atau Password salah');
               return view('auth.login');
           }
         }



        public function logout()
         {
         
            Auth::logout();
            return redirect('login');
        }
    
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }


    public function register(RegisterRequest $request)
    {
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $pass = bcrypt($request->password);

        // dd($_POST);
        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $pass;
        $user->role = "pemilik";
        $user->active = "1";
        $user->save();

        $pemilik = new Pemilik;
        $pemilik->nama = $name;
        $pemilik->username = $username;
        $pemilik->foto_profile = "user.png";
        $pemilik->save();

        \Flash::success('Berhasil mendaftar, silahkan <a href="login">login</a>');
        return redirect('/register');
    }

    // public function showRegistrationForm()
    // {
    //     return redirect('login');
    // }

    


    // protected function getCredentials(Illuminate\Http\Request $request)
    // {
    //     return $request->only($this->loginUsername(), 'password') + ['active' => 1];
    // }

    //  public function authenticate()
    // {
    //     if (Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1])) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }

}
