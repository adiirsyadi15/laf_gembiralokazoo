<?php

namespace App\Http\Controllers\pemilik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Barang;


use File;
use \DateTime;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\BarangRequest;
use App\Kategori;
use App\Proses;
use App\Kehilangan;
use App\Foto;
use Auth;

class BarangController extends Controller
{
    public function tambah($username, $id_proses)
    {
        $kategoris = Kategori::lists('nama', 'id_kategori');
        $username = $username;
        $id_proses = $id_proses;
        // dd($kategoris);
        return view('laf_app.barang.tambah', compact('kategoris', 'username', 'id_proses'));
    }

    public function Simpan(BarangRequest $request, $username, $id_proses)
    {
        $nama = $request->nama_barang;
        $id_kategori = $request->id_kategori;
        $ciri_ciri = $request->ciri_ciri;

        $barang = new Barang;
        $barang->id_kategori = $id_kategori;
        $barang->nama = $nama;
        $barang->ciri_ciri = $ciri_ciri;
        $barang->save();

        // ambl id barang terbaru untuk disimpan ke foto dan tabel kehilangan
        $barang = Barang::orderby('updated_at', 'desc')->first();

        // dd($barang);
        // simpan data barang ke kehilangan
        $kehilangan = new Kehilangan;
        $kehilangan->id_barang = $barang->id_barang;
        $kehilangan->id_proses = $id_proses;
        $kehilangan->status_kehilangan = "hilang";
        $kehilangan->save();

        $date = new DateTime();
        $datetosting = $date->format('Y-m-d-H-i-s');
        
        
        if(Input::hasFile('foto_barang_1')){
            $foto_barang_1 = $request->file('foto_barang_1')->getClientOriginalName();

            $foto_barang_1_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_1;
            // simpan foto 1
            $foto1 = new Foto;
            $foto1->id_barang= $barang->id_barang;
            $foto1->nama= $foto_barang_1_baru;
            $foto1->save();


            $destination_barang1 = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $request->file('foto_barang_1')->move($destination_barang1, $foto_barang_1_baru);
        }else{
            $foto1 = new Foto;
            $foto1->id_barang= $barang->id_barang;
            $foto1->nama= "barang.png";
            $foto1->save();
        }

        
        if(Input::hasFile('foto_barang_2')){
            $foto_barang_2 = $request->file('foto_barang_2')->getClientOriginalName();

            $foto_barang_2_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_2;
            
            // simpan foto 2
            $foto2 = new Foto;
            $foto2->id_barang= $barang->id_barang;
            $foto2->nama= $foto_barang_2_baru;
            $foto2->save();

            $destination_barang2 =public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $request->file('foto_barang_2')->move($destination_barang2, $foto_barang_2_baru);
        }

        if(Input::hasFile('foto_barang_3')){
            $foto_barang_3 = $request->file('foto_barang_3')->getClientOriginalName();

            $foto_barang_3_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_3;
            
            // simpan foto 3
            $foto3 = new Foto;
            $foto3->id_barang= $barang->id_barang;
            $foto3->nama= $foto_barang_3_baru;
            $foto3->save();

            $destination_barang3 = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $request->file('foto_barang_3')->move($destination_barang3, $foto_barang_3_baru);
        }



        \Flash::success('berhasil menambah data barang');       
        return redirect()->route('pemilik.kehilangan.detail', [$username, $id_proses]);
    }

    public function edit($username, $id_proses, $id_barang)
    {
        
    }

    public function update(BarangRequest $request, $username, $id_proses, $id_barang)
    {
        
    }

    public function destroy($username, $id_proses, $id_barang)
    {
        
    }
   
}
