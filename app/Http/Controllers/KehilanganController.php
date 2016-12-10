<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
class KehilanganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        
        $cat = $request->get('cat');

        $kehilangans = DB::table('barangs')
            ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->join('fotos','fotos.id_barang','=','barangs.id_barang')
            ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
            ->join('proses', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('barangs.nama', 'like','%'.$q.'%')
            ->where('kategoris.id_kategori', 'like','%'.$cat.'%')
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang', 'barangs.nama as nama_barang', 'proses.id_proses', 'kejadians.tanggal', 'kejadians.lokasi', 'kejadians.keterangan', 'fotos.nama as nama_foto', 'pemiliks.nama as nama_pemilik', 'kategoris.nama as nama_kategori', 'kehilangans.status_kehilangan', 'kehilangans.id_kehilangan')
            ->paginate(6);
       
        return view('laf_app.kehilangan.index', compact('kehilangans', 'q'));

    }

    public function show($id_kehilangan)
    {

        $kehilangans = DB::table('barangs')
            ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->join('fotos','fotos.id_barang','=','barangs.id_barang')
            ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
            ->join('proses', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('kehilangans.id_kehilangan', 'like','%'.$id_kehilangan.'%')
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang', 'barangs.nama as nama_barang', 'proses.id_proses', 'kejadians.tanggal', 'kejadians.lokasi','kejadians.waktu','kejadians.hari','kejadians.tanggal', 'kejadians.keterangan', 'fotos.nama as nama_foto', 'pemiliks.nama as nama_pemilik', 'kategoris.nama as nama_kategori', 'kehilangans.status_kehilangan', 'pemiliks.no_hp')
            ->get();
       
        return view('laf_app.kehilangan.show', compact('kehilangans'));

    }
}
