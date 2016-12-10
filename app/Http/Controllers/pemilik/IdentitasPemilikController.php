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

use App\Http\Requests\IdentitasPemilikrequest;

use Auth;

class IdentitasPemilikController extends Controller
{
    public function Identitas($id)
    {
        $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        
        $identitas = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->get();

        // dd($identitas);
        
        return view('laf_app.pemilik.identitas', compact('identitas', 'pemiliks'));
    }

    public function TambahIdentitas($id)
    {
        $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        
        $identitas = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->get();
        
        return view('laf_app.pemilik.identitas_tambah', compact('identitas', 'pemiliks'));
    }

    public function SimpanIdentitas(IdentitasPemilikrequest $request, $id)
    {
        // dd($_POST);

        $pemiliks = Pemilik::where('username', $id)->firstOrFail();
        $id_pemilik = $pemiliks->id_pemilik;

        $jenis_1 = $request->jenis_1;
        $jenis_2 = $request->jenis_2;
        $nomor_1 = $request->nomor_1;
        $nomor_2 = $request->nomor_2;



        $identitas_1 = new Identitas;
        $identitas_1->id_pemilik = $id_pemilik;
        $identitas_1->jenis_identitas = $jenis_1;
        $identitas_1->nomor_identitas = $nomor_1;

        if(Input::hasFile('gambar_1')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d');
            $destination_identitas = base_path() . '/public/images/identitas';

            $namagambar = $request->file('gambar_1')->getClientOriginalName();

            $gambar_baru = $jenis_1.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar_1')->move($destination_identitas, $gambar_baru);

            $identitas_1->gambar= $gambar_baru;
        }
        $identitas_1->save();


        $identitas_2 = new Identitas;
        $identitas_2->id_pemilik = $id_pemilik;
        $identitas_2->jenis_identitas = $jenis_2;
        $identitas_2->nomor_identitas = $nomor_2;

        if(Input::hasFile('gambar_2')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d');
            $destination_identitas = base_path() . '/public/images/identitas';

            $namagambar = $request->file('gambar_2')->getClientOriginalName();

            $gambar_baru = $jenis_2.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar_2')->move($destination_identitas, $gambar_baru);

            $identitas_2->gambar= $gambar_baru;
        }
        $identitas_2->save();

        \Flash::success('berhasil menambah data identitas'.$id);
        return redirect()->route('pemilik.identitas', [$id]);
    }

    public function EditIdentitas($id)
    {
        // ambil id pemilik
        $pemiliks = Pemilik::with('usercall')->where('username', $id)->firstOrFail();
        // ambil identitas 
        $identitas_1 = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->firstOrFail();
        $identitas_2 = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->orderby('id_identitas', 'desc')->firstOrFail();

        // dd($identitas_2);
        
        return view('laf_app.pemilik.identitas_edit', compact('identitas_1', 'identitas_2', 'pemiliks'));
    }

    public function UpdateIdentitas(IdentitasPemilikrequest $request, $id)
    {
        // dd($_POST);

        $pemiliks = Pemilik::where('username', $id)->firstOrFail();
        $pemiliks->status_verifikasi = 0;
        $pemiliks->save();
        $id_pemilik = $pemiliks->id_pemilik;

        $jenis_1 = $request->jenis_1;
        $jenis_2 = $request->jenis_2;
        $nomor_1 = $request->nomor_1;
        $nomor_2 = $request->nomor_2;

        $identitas_1 = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->firstOrFail();
        $identitas_2 = Identitas::where('id_pemilik', '=', $pemiliks->id_pemilik)->orderby('id_identitas', 'desc')->firstOrFail();

        $identitas_1 = Identitas::where('id_identitas', $identitas_1->id_identitas)->first();
        $identitas_1->id_pemilik = $id_pemilik;
        $identitas_1->jenis_identitas = $jenis_1;
        $identitas_1->nomor_identitas = $nomor_1;

        if(Input::hasFile('gambar_1')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d');
            $destination_identitas = base_path() . '/public/images/identitas';

            $namagambar = $request->file('gambar_1')->getClientOriginalName();

            // delete foto dari sistem
            File::delete($destination_identitas.'/'.$identitas_1->gambar);

            $gambar_baru = $jenis_1.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar_1')->move($destination_identitas, $gambar_baru);

            $identitas_1->gambar= $gambar_baru;
        }
        $identitas_1->save();


        $identitas_2 = Identitas::where('id_identitas', $identitas_2->id_identitas)->first();
        $identitas_2->id_pemilik = $id_pemilik;
        $identitas_2->jenis_identitas = $jenis_2;
        $identitas_2->nomor_identitas = $nomor_2;

        if(Input::hasFile('gambar_2')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d');
            $destination_identitas = base_path() . '/public/images/identitas';

            $namagambar = $request->file('gambar_2')->getClientOriginalName();

            // delete foto dari sistem
            File::delete($destination_identitas.'/'.$identitas_2->gambar);

            $gambar_baru = $jenis_2.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar_2')->move($destination_identitas, $gambar_baru);

            $identitas_2->gambar= $gambar_baru;
        }
        $identitas_2->save();

        \Flash::success('berhasil merubah data identitas'.$id);
        return redirect()->route('pemilik.identitas', [$id]);
    }
}
