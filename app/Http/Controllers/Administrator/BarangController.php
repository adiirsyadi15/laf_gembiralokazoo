<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BarangRequest;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Input;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use File;
use \DateTime;

use App\Barang;
use App\Kehilangan;
use App\Penemuan;
use App\Foto;

use DB;
use PDF;

class BarangController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id_proses)
    {
        $kategoris = DB::table('kategoris')->orderBy('nama', 'asc')->lists('nama','id_kategori');

        $id_proses = $id_proses;

        // ambil route yg aktf
        $route_name = Route::getCurrentRoute()->getName();
        // dd($route_name);

        // jika route yg aktif pengolahan.kehilangan.tambah_barang
        // maka data akan diload view laf_app_administrator.barang.tambah_barang_kehilangan
        if ($route_name == "pengolahan.kehilangan.tambah_barang")
        {
            return view('laf_app_administrator.barang.tambah_barang_kehilangan', compact('kategoris', 'id_proses'));
        } else {
            return view('laf_app_administrator.barang.tambah_barang_penemuan', compact('kategoris', 'id_proses'));
        }

    }

    public function store(BarangRequest $b, $id_proses)
    {
        // set variable dari request
        $nama = $b->nama_barang;
        $id_kategori = $b->id_kategori;
        $ciri_ciri = $b->ciri_ciri;
        $id_proses = $id_proses;

        $barang = new Barang;
        $barang->id_kategori = $id_kategori;
        $barang->nama = $nama;
        $barang->ciri_ciri = $ciri_ciri;
        $barang->save();

        // ambl id barang terbaru untuk disimpan ke foto dan tabel kehilangan
        $barang = Barang::orderby('created_at', 'desc')->first();


        // save gambar 1
        if(Input::hasFile('foto_barang_1')){
            $gambar = $this->simpan_foto($b->file('foto_barang_1'));
            $foto = new Foto;
            $foto->id_barang= $barang->id_barang;
            $foto->nama= $gambar;
            $foto->save();
        }
        else
        {
            $foto = new Foto;
            $foto->id_barang= $barang->id_barang;
            $foto->nama= "barang.png";
            $foto->save();
        }

        // save gambar 2
        if(Input::hasFile('foto_barang_2')){
            $gambar = $this->simpan_foto($b->file('foto_barang_2'));
            $foto = new Foto;
            $foto->id_barang= $barang->id_barang;
            $foto->nama= $gambar;
            $foto->save();
        }

        // save gambar 3
        if(Input::hasFile('foto_barang_3')){
            $gambar = $this->simpan_foto($b->file('foto_barang_3'));
            $foto = new Foto;
            $foto->id_barang= $barang->id_barang;
            $foto->nama= $gambar;
            $foto->save();
        }


        // ambil route yg aktf
        $route_name = Route::getCurrentRoute()->getName();
        // dd($route_name);
        // jika route yg aktif pengolahan.kehilangan.simpan_barang
        // maka data akan  alihka ke route pengolahan.kehilangan.show
        if ($route_name == "pengolahan.kehilangan.simpan_barang")
        {
            // simpan data barang ke kehilangan
            $kehilangan = new Kehilangan;
            $kehilangan->id_barang = $barang->id_barang;
            $kehilangan->id_proses = $id_proses;
            $kehilangan->status_kehilangan = "hilang";
            $kehilangan->save();

            \Flash::success('data barang berhasil di tambah');
            return redirect()->route('pengolahan.kehilangan.show', $id_proses);
        } else {
            // ambil nama penemu
            $penemuan = Penemuan::where('id_proses', $id_proses)->first();
            $nama_penemu = $penemuan->nama_penemu;

            // simpan data barang ke Penemuan
            $penemuan = new Penemuan;
            $penemuan->id_barang = $barang->id_barang;
            $penemuan->id_proses = $id_proses;
            $penemuan->nama_penemu = $nama_penemu;
            $penemuan->status_pengambilan = "belum diambil";
            $penemuan->save();

            \Flash::success('data barang berhasil di tambah');
            return redirect()->route('pengolahan.penemuan.show', $id_proses);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id_proses,$id_barang)
    {
        $kategoris = DB::table('kategoris')->orderBy('nama', 'asc')->lists('nama','id_kategori');

        $barangs = Barang::where('id_barang', $id_barang)->first();

        $id_barang = $id_barang;
        // dd($barangs);
        // ambil route yg aktf
        $route_name = Route::getCurrentRoute()->getName();
        // dd($route_name);

        // get route yang aktif
        if ($route_name == "pengolahan.kehilangan.edit_barang")
        {
            return view('laf_app_administrator.barang.edit_barang_kehilangan', compact('kategoris', 'barangs', 'id_barang', 'id_proses'));
        } else {
            return view('laf_app_administrator.barang.edit_barang_penemuan', compact('kategoris', 'barangs', 'id_barang','id_proses'));
        }
    }

    public function update(BarangRequest $b, $id_proses, $id_barang)
    {
        // set variable dari request
        $nama = $b->nama_barang;
        $id_kategori = $b->id_kategori;
        $ciri_ciri = $b->ciri_ciri;

        $barang = Barang::where('id_barang', $id_barang)->first();
        $barang->id_kategori = $id_kategori;
        $barang->nama = $nama;
        $barang->ciri_ciri = $ciri_ciri;
        $barang->save();


        // save gambar 1
        if(Input::hasFile('foto_barang_1')){
            $gambar = $this->simpan_foto($b->file('foto_barang_1'));
            $foto = Foto::where('id_barang', $id_barang)->first();
            $foto->nama= $gambar;
            $foto->save();
        }

        // save gambar 2
        if(Input::hasFile('foto_barang_2')){
            $gambar = $this->simpan_foto($b->file('foto_barang_2'));
            $foto = Foto::where('id_barang', $id_barang)->first();
            $foto->nama= $gambar;
            $foto->save();
        }

        // save gambar 3
        if(Input::hasFile('foto_barang_3')){
            $gambar = $this->simpan_foto($b->file('foto_barang_3'));
            $foto = Foto::where('id_barang', $id_barang)->first();
            $foto->nama= $gambar;
            $foto->save();
        }


        // ambil route yg aktf
        $route_name = Route::getCurrentRoute()->getName();
        // dd($route_name);
        // jika route yg aktif pengolahan.kehilangan.simpan_barang
        // maka data akan  alihka ke route pengolahan.kehilangan.show
        if ($route_name == "pengolahan.kehilangan.update_barang")
        {
            \Flash::success('data barang berhasil di rubah');
            return redirect()->route('pengolahan.kehilangan.show', $id_proses);
        } else {

            \Flash::success('data barang berhasil di rubah');
            return redirect()->route('pengolahan.penemuan.show', $id_proses);
        }
    }

    public function destroy($id)
    {
        //
    }


    // method simpan foto
    public function simpan_foto(UploadedFile $photo){
        // ambil tanggal
        $date = new DateTime();
        $datetosting = $date->format('d-m-Y-H-i-s');
        // ambil nama gambar dan esktensi
        $file_name = $photo->getClientOriginalName();
        // nama gambar baru
        $nama_foto = $datetosting.'_'.$file_name;
        // file simpan gambar
        $destination_foto = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';
        // simpan file nama
        $gambarpindah = $photo->move($destination_foto, $nama_foto);

        return $nama_foto;
    }

    public function cetak_label($id_proses, $id_barang)
    {
        $barang = Barang::join('penemuans','penemuans.id_barang','=','barangs.id_barang')
            ->join('proses','penemuans.id_proses','=','proses.id_proses')
            ->join('kejadians','proses.id_kejadian','=','kejadians.id_kejadian')
            ->where('barangs.id_barang', $id_barang)
            ->first();

        // dd($proses);

        $pdf = PDF::loadView('laf_app_administrator.cetak.cetak_label_barang', compact('barang'));

        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak_label_barang.pdf');
    }
}
