<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use File;
use \DateTime;

//database model
use App\User;
use App\Petugas;


use Illuminate\Support\Facades\Input;

//validasi form
use App\Http\Requests\UserPetugasRequest;


class UserPetugasController extends Controller
{
    

    public function index(Request $request)
    {
        $q = $request->get('q');

        $petugas = DB::table('users')
            ->crossJoin('petugas')
            ->groupBy('petugas.username')
            ->where('nama', 'like','%'.$q.'%')
            ->orderBy('id_petugas')
            ->paginate(5);

        return view('laf_app_administrator.user.petugas.index', compact('petugas', 'q'));
    }

    public function create()
    {
        return view('laf_app_administrator.user.petugas.create');
    }

    public function store(UserPetugasRequest $request)
    {
        // get data dari form
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $password = bcrypt($request->password);
        $role = "petugas";
        $active = 1;
        $no_hp = $request->no_hp;
        $jk = $request->jk;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $agama = $request->agama;

        // simpan ke table user
        $user = new User;
        $user->username= $username;
        $user->email= $email;
        $user->password= $password;
        $user->role= $role;
        $user->active= $active;
        $user->save();

        // simpan ke table petugas
        $petugas = new Petugas;
        $petugas->username= $username;
        $petugas->nama= $nama;
        $petugas->jenis_kelamin= $jk;
        $petugas->tempat_lahir= $tempat_lahir;
        $petugas->tanggal_lahir= $tanggal_lahir;
        $petugas->alamat= $alamat;
        $petugas->agama= $agama;
        $petugas->no_hp= $no_hp;
        if(Input::hasFile('foto')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d-H-i-s');
            // $destination_fotoprofile = base_path() . '/public/images/fotoprofile';
            $destination_fotoprofile = public_path() . DIRECTORY_SEPARATOR . 'images/fotoprofile';
            $foto_petugas = $request->file('foto')->getClientOriginalName();
            $foto_petugas_baru = $role.'_'.$datetosting.'_'.$foto_petugas;
			$petugas->foto_profile= $foto_petugas_baru;

			$request->file('foto')->move($destination_fotoprofile, $foto_petugas_baru);
        }else{
        	$petugas->foto_profile= "user.png";
        }
        $petugas->save();


        \Flash::success('Data Petugas berhasil ditambahkan.');
        return redirect()->route('userpetugas.index');
        
    }

    public function show($id)
    {
        $petugas = DB::table('petugas')
            ->leftJoin('users', 'petugas.username', '=', 'users.username')
            ->where('users.username', '=', $id)
            ->get();

        return view('laf_app_administrator.user.petugas.show', compact('petugas'));
    }

    public function edit($id)
    {
        $petugas = User::with('petugascall')->where('username', $id)->firstOrFail();
        return view('laf_app_administrator.user.petugas.edit', compact('petugas')); // 
    }

    public function update(UserPetugasRequest $request, $id)
    {
        
        // get data dari form
        $nama = $request->nama;
        $username = $request->username;
        $email = $request->email;
        $jk = $request->jk;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $agama = $request->agama;
        $no_hp = $request->no_hp;

        // simpan ke table user
        $user = User::where('username', $id)->first();
        $user->email= $email;
        $user->save();

        // simpan ke table Petugas
        $petugas = Petugas::where('username', $id)->first();
        $petugas->nama= $nama;
        $petugas->jenis_kelamin= $jk;
        $petugas->tempat_lahir= $tempat_lahir;
        $petugas->tanggal_lahir= $tanggal_lahir;
        $petugas->alamat= $alamat;
        $petugas->agama= $agama;
        $petugas->no_hp= $no_hp;
        if(Input::hasFile('foto')){
            // folder tempat menyimpan file foto
            $destination_fotoprofile = public_path() . DIRECTORY_SEPARATOR . 'images/fotoprofile';
            // mendapatka nama file foto yang akan di delete
            $petugas = Petugas::where('username', $id)->firstOrFail();
            // delete foto dari sistem
            if($petugas->foto_profile != "user.png"){
            File::delete($destination_fotoprofile.'/'.$petugas->foto_profile);
            }

            $date = new DateTime();
            $datetosting = $date->format('Y-m-d-H-i-s');
            
            $foto_petugas = $request->file('foto')->getClientOriginalName();
            $foto_petugas_baru = 'petugas_'.$datetosting.'_'.$foto_petugas;
            $petugas->foto_profile= $foto_petugas_baru;

            $request->file('foto')->move($destination_fotoprofile, $foto_petugas_baru);
        }
        $petugas->save();

        // dd($admin);
        \Flash::success('data '.$request->nama. ' updated.');
        return redirect()->route('userpetugas.index');
    }

    public function destroy($id)
    {
        // $findusername = Petugas::find($id);
        // $username = $findusername->username;
        // // dd($username);
        // $deleteuser = DB::table('users')->where('username', '=', $username)->delete();
        // // dd($delete);
        // $deleteadmin = Petugas::find($id)->delete();

        

        // mulai delete file foto
        // folder tempat menyimpan file foto
        // mendapatka nama file foto yang akan di delete

        $petugas = Petugas::where('username', $id)->firstOrFail();
        
        // delete foto dari sistem
        if($petugas->foto_profile != "user.png"){
            $destination_fotoprofile = public_path() . DIRECTORY_SEPARATOR . 'images/fotoprofile';
            File::delete($destination_fotoprofile.'/'.$petugas->foto_profile);
            // slesai delete file 
        }


        $del_petugas = Petugas::where('username', $id)->delete();
        $del_user = User::where('username', $id)->delete();


        \Flash::success('Data petugas berhasil dihapus');
        return redirect()->route('userpetugas.index');
    }

}
