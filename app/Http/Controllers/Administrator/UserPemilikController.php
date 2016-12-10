<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



use DB;

use File;
use \DateTime;

use App\User;
use App\Pemilik;
use App\Identitas;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\UserPemilikRequest;

class UserPemilikController extends Controller
{
    

    public function index(Request $request)
    {
        $q = $request->get('q');

        $pemiliks = DB::table('users')
            ->crossJoin('pemiliks')
            ->groupBy('pemiliks.username')
            ->where('nama', 'like','%'.$q.'%')
            ->orderBy('id_pemilik')
            ->paginate(5);
           // dd($pemiliks);
        return view('laf_app_administrator.user.pemilik.index', compact('pemiliks', 'q'));
    }

    public function create()
    {
        return view('laf_app_administrator.user.pemilik.create');
    }

    public function store(UserPemilikRequest $request)
    {

        // dd($_POST);

        
        $username= $request->username;
        $email= $request->email;
        // password dari tanggal lahir
        $pass= bcrypt($request->tanggal_lahir);
        $role= "pemilik";
        $active= 1;

        $nama_pemilik= $request->nama;
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


        $user = new User;
        $user->username= $username;
        $user->email= $email;
        $user->password= $pass;
        $user->role= $role;
        $user->active= $active;
        $user->save();

        $pemilik = new Pemilik;
        $pemilik->username= $username;
        $pemilik->nama= $nama_pemilik;
        $pemilik->jenis_kelamin= $jk;
        $pemilik->tempat_lahir= $tempatlahir;
        $pemilik->tanggal_lahir= $tanggallahir;
        $pemilik->alamat= $alamat;
        $pemilik->pekerjaan= $pekerjaan;
        $pemilik->agama= $agama;
        $pemilik->no_hp= $no_hp;
        $pemilik->pin_bbm= $no_hp;
        $pemilik->line= $line;
        $pemilik->whatsapp= $whatsapp;
        $pemilik->status_verifikasi= $status_verifikasi;

        if(Input::hasFile('foto')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d-H-i-s');
            $destination_fotoprofile = base_path() . '/public/images/fotoprofile';
            $foto_pemilik = $request->file('foto')->getClientOriginalName();
            $foto_pemilik_baru = $role.'_'.$datetosting.'_'.$foto_pemilik;
             $pemilik->foto_profile= $foto_pemilik_baru;

             $request->file('foto')->move($destination_fotoprofile, $foto_pemilik_baru);
        }else{
            $pemilik->foto_profile= "user.png";
        }
        $pemilik->save();

        \Flash::success('Data pemilik disimpan.');
        return redirect()->route('userpemilik.index');
        
    }

    public function show($id)
    {

        $pemiliks = DB::table('pemiliks')
            ->leftJoin('users', 'pemiliks.username', '=', 'users.username')
            ->where('users.username', '=', $id)
            ->get();
        // dd($pemiliks);

        $findidpemilik = Pemilik::where('username', $id)->first();

        // data harus ada
        // $identitas = Identitas::where('id_pemilik', '=', $findidpemilik->id_pemilik)->firstOrFail();


        $identitas = Identitas::where('id_pemilik', '=', $findidpemilik->id_pemilik)->get();
        // dd($identitas);
        // sama bisa di gunakan
        // $identitas = DB::table('identitas')
        //     ->where('id_pemilik', '=', $findidpemilik->id_pemilik)
        //     ->get();

        
        return view('laf_app_administrator.user.pemilik.show', compact('pemiliks', 'identitas'));
    }

    public function edit($id)
    {
         $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        return view('laf_app_administrator.user.pemilik.edit', compact('pemiliks'));
    }

    public function update(UserPemilikRequest $request, $id)
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
            $destination_fotoprofile = base_path() . '/public/images/fotoprofile';

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

        \Flash::success('data '.$nama_pemilik. ' berhasil di rubah');
        return redirect()->route('userpemilik.show', [$id]);
    }

    public function destroy($id)
    {
        // dd($username);
        // mendapatka nama file foto yang akan di delete
        $pemilik = Pemilik::where('username', $id)->firstOrFail();
        // delete foto dari sistem
        if($pemilik->foto_profile != "user.png"){
            $destination_fotoprofile = base_path() . '/public/images/fotoprofile';
            File::delete($destination_fotoprofile.'/'.$pemilik->foto_profile);
        }


        $del_identitas =  Identitas::where('id_pemilik', $pemilik->id_pemilik)->delete();
        // dd($del_identitas);
        $del_petugas = Pemilik::where('username', $id)->delete();
        $del_user = User::where('username', $id)->delete();


        \Flash::success('Pemilik deleted.');
        return redirect()->route('userpemilik.index');
    }

    public function verifikasi($id)
    {
        // dd($_POST);
        // mendapatkan data dari form
        $verifikasi = $_POST['verifikasi'];
        // cari id pemilik dg username
        $pemilik = Pemilik::where('username', $id)->first();
        // hitung jumlah identitas dari username
        $jumlahidentitas = DB::table('identitas')
                ->where('id_pemilik', '=', $pemilik->id_pemilik)
                ->count();


        if($jumlahidentitas >= 1){
            if($verifikasi == 1 ){
            $verifikasi = 0;
            }else{
                $verifikasi = 1;
            }
            $pemilik = Pemilik::where('username', $id)->first();
            $pemilik->status_verifikasi= $verifikasi;
            $pemilik->save();
            \Flash::success('verifikasi '.$id.' sukses');
            return redirect()->route('userpemilik.show', [$id]);

        }else{
            \Flash::error('verifikasi '.$id.' gagal.data pribadi harus lengkap dan lampiran identitas minimal 2. lengkapi data-data lalu verifikasi kembali !!');
            return redirect()->route('userpemilik.show', [$id]);
        }
    }

}
