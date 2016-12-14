<?php

namespace App\Http\Controllers\pemilik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pemilik;
use App\Identitas;
use App\User;


use File;
use \DateTime;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\UserPemilikRequest;

use Auth;

class PemilikController extends Controller
{
    public function profile($id)
    {
        $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        
        // $identitas = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->get();

        // dd($pemiliks);
        
        return view('laf_app.pemilik.profile', compact('pemiliks'));
    }

    public function EditProfile($id)
    {
        $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        
        return view('laf_app.pemilik.profile_edit', compact('pemiliks'));
    }

    public function SimpanProfile(UserPemilikRequest $request, $id)
    {
        // dd($_POST);
        $nama_pemilik= $request->nama;
        $email= $request->email;
        $role = "pemilik";
        $jk= $request->jk;
        $tempatlahir= $request->tempat_lahir;
        $tanggallahir= $request->tanggal_lahir;
        $alamat= $request->alamat;
        $pekerjaan= $request->pekerjaan;
        $agama= $request->agama;
        $no_hp= $request->no_hp;
        $pin_bbm= $request->pin_bbm;
        $line= $request->line;
        $whatsapp= $request->whatsapp;
        $status_verifikasi= 0;

        // $user = new User;
        $user = User::where('username', $id)->first();
        $email= $request->email;
        $user->save();

        // $pemilik = new Pemilik;
        $pemilik = Pemilik::where('username', $id)->first();
        $pemilik->nama= $nama_pemilik;
        $pemilik->jenis_kelamin= $jk;
        $pemilik->tempat_lahir= $tempatlahir;
        $pemilik->tanggal_lahir= $tanggallahir;
        $pemilik->alamat= $alamat;
        $pemilik->pekerjaan= $pekerjaan;
        $pemilik->agama= $agama;
        $pemilik->no_hp= $no_hp;
        $pemilik->pin_bbm= $pin_bbm;
        $pemilik->line= $line;
        $pemilik->whatsapp= $whatsapp;
        $pemilik->status_verifikasi= $status_verifikasi;

        if(Input::hasFile('foto')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d-H-i-s');
            $destination_fotoprofile = public_path() . DIRECTORY_SEPARATOR . 'images/fotoprofile';

            // mendapatka nama file foto yang akan di delete
            $pemilik = Pemilik::where('username', $id)->firstOrFail();
            // delete foto dari sistem
            if($pemilik->foto_profile != "user.png"){
                File::delete($destination_fotoprofile.'/'.$pemilik->foto_profile);
            }
            
            $foto_pemilik = $request->file('foto')->getClientOriginalName();
            $foto_pemilik_baru = $role.'_'.$datetosting.'_'.$foto_pemilik;
             $pemilik->foto_profile= $foto_pemilik_baru;

             $request->file('foto')->move($destination_fotoprofile, $foto_pemilik_baru);
        }
       
        $pemilik->save();
        
        \Flash::success('data berhasil dirubah');
        return redirect()->route('pemilik.profile', [$id]);
    }
}
