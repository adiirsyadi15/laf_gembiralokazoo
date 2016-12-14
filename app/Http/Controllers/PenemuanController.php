<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use DB;
class PenemuanController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $cat = $request->get('cat');
        $status = $request->get('status');

        $penemuans = DB::table('barangs')
            ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
            ->join('fotos','fotos.id_barang','=','barangs.id_barang')
            ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
            ->join('proses', 'penemuans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->leftjoin('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('barangs.nama', 'like','%'.$q.'%')
            ->where('kategoris.id_kategori', 'like','%'.$cat.'%')
            ->where('penemuans.status_pengambilan', 'like','%'.$status.'%')
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang', 'barangs.nama as nama_barang', 'proses.id_proses', 'kejadians.tanggal', 'kejadians.lokasi', 'kejadians.keterangan', 'fotos.nama as nama_foto', 'pemiliks.nama as nama_pemilik', 'kategoris.nama as nama_kategori', 'penemuans.status_pengambilan', 'penemuans.id_penemuan')
            ->orderby('barangs.nama')
            ->paginate(6);

        // dd($penemuans);

        // setting paginage supaya pake tidak hilang ketika ada parameter get di url
        $penemuans->appends(Input::except('page'))->links();


       
        return view('laf_app.penemuan.index', compact('penemuans', 'q'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id_penemuan)
    {
        $penemuans = DB::table('barangs')
            ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
            ->join('fotos','fotos.id_barang','=','barangs.id_barang')
            ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
            ->join('proses', 'penemuans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->leftjoin('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->leftjoin('users', 'users.username', '=', 'pemiliks.username')
            ->where('penemuans.id_penemuan', 'like','%'.$id_penemuan.'%')
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang', 'barangs.nama as nama_barang', 'proses.id_proses', 'kejadians.tanggal', 'kejadians.lokasi','kejadians.waktu','kejadians.hari','kejadians.tanggal', 'kejadians.keterangan', 'fotos.nama as nama_foto', 'pemiliks.nama as nama_pemilik', 'kategoris.nama as nama_kategori', 'penemuans.status_pengambilan', 'pemiliks.no_hp')
            ->get();
       
        return view('laf_app.penemuan.show', compact('penemuans'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function filter(Request $request){
        
    }
}
