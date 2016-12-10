<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Admin;
use App\Petugas;


class AdministratorController extends Controller
{
    public function DashboardAdmin()
    {
        return view('laf_app_administrator.user.admin.dashboard');
    }
    public function ProfileAdmin($id)
    {
        $profiles = Admin::where('username', $id)->firstOrFail();

    	// dd($profiles);
        return view('laf_app_administrator.user.admin.profile', compact('profiles'));
    }


    public function DashboardPetugas()
    {
        return view('laf_app_administrator.user.petugas.dashboard');
    }
    public function ProfilePetugas($id)
    {
        $profiles = Petugas::where('username', $id)->firstOrFail();
        // dd($profiles);
        // dd($profiles);
        return view('laf_app_administrator.user.petugas.profile', compact('profiles'));
    }
}
