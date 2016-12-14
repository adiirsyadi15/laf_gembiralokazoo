<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\IdentitasRequest;

use App\Identitas;

use Illuminate\Support\Facades\Input;

use \DateTime;
use File;

class IdentitasController extends Controller
{
    public function store(IdentitasRequest $request)
    {
    	// dd($_POST);

    	$id_pemilik= $request->id_pemilik;
    	$username= $request->username;
        $jenis= $request->jenis;
        $nomor= $request->nomor;


        $identitas = new Identitas;
        $identitas->id_pemilik = $id_pemilik;
        $identitas->jenis_identitas = $jenis;
        $identitas->nomor_identitas = $nomor;

        if(Input::hasFile('gambar')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d');
            $destination_identitas = public_path() . DIRECTORY_SEPARATOR .  'images/identitas';

            $namagambar = $request->file('gambar')->getClientOriginalName();

            $gambar_baru = $jenis.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar')->move($destination_identitas, $gambar_baru);

            $identitas->gambar= $gambar_baru;
        }
		$identitas->save();

		\Flash::success('berhasil menambah data identitas'.$username);
        return redirect()->route('userpemilik.show', [$username]);
    }

    public function update(IdentitasRequest $request, $id)
    {
        // dd($_POST);
    	// dd($id);

    	$username= $request->username;
        $jenis= $request->jenis;
        $nomor= $request->nomor;
        $id_pemilik= $request->id_pemilik;

        $identitas = Identitas::where('id_identitas', $id)->first();

        $identitas->jenis_identitas = $jenis;
        $identitas->nomor_identitas = $nomor;

        if(Input::hasFile('gambar')){
            $date = new DateTime();
            $datetosting = $date->format('Y-m-d-H-i-s');
            $destination_identitas = public_path() . DIRECTORY_SEPARATOR . 'images/identitas';

            $del = Identitas::where('id_identitas', $id)->firstOrFail();
            // delete foto dari sistem
            // dd($del);
            File::delete($destination_identitas.'/'.$del->gambar);

            $namagambar = $request->file('gambar')->getClientOriginalName();

            $gambar_baru = $jenis.'_'.$datetosting.'_'.$id_pemilik.'_'.$namagambar;
            $request->file('gambar')->move($destination_identitas, $gambar_baru);

            $identitas->gambar= $gambar_baru;
        }
		$identitas->save();

		\Flash::success('berhasil merubah data identitas'.$username);
        return redirect()->route('userpemilik.show', [$username]);
    }
}
