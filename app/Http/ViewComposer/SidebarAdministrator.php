<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use App\Barang;
use App\Admin;
use App\Petugas;

use Auth;

class SidebarAdministrator 
{
        public function compose(View $view)	
        {
                $role  =Auth::user()->role;
                $username  =Auth::user()->username;

                if($role == "admin"){
                        $foto_sidebar = Admin::where('username', $username)->first();
                }else{
                        $foto_sidebar = Petugas::where('username', $username)->first();
                }
                // dd($foto_sidebar);
                $view->with('foto_sidebar', $foto_sidebar);
        }
}