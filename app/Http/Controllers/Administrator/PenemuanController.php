<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use \DateTime;
use App\Http\Requests\BarangRequest;
use App\Http\Requests\KejadianRequest;
use App\Kejadian;
use App\Pemilik;
use App\Proses;
use App\Petugas;
use App\Barang;
use App\Kehilangan;
use App\Foto;
use Illuminate\Support\Facades\Input;
use Auth;
use PDF;

class PenemuanController extends Controller
{
    public function index()
    {

        $penemuans = DB::table('proses')
            ->join('penemuans', 'penemuans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->leftjoin('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->groupBy('proses.id_proses')
            ->select('proses.id_proses', 'pemiliks.nama', 'kejadians.tanggal','kejadians.lokasi')
            ->orderBy('kejadians.tanggal', 'desc')
            ->paginate(10);
         // dd($penemuans);

        return view('laf_app_administrator.penemuan.index', compact('penemuans'));

    }

    public function create()
    {
        $kategoris = DB::table('kategoris')->orderBy('nama', 'asc')->lists('nama','id_kategori');

        $pemiliks = DB::table('pemiliks')->where('status_verifikasi', 1)->orderBy('nama', 'asc')->get();

        // dd($pemiliks);

        return view('laf_app_administrator.kehilangan.create')->with('kategoris',$kategoris)
        ->with('pemiliks', $pemiliks);
    }

    public function store(KejadianRequest $k, BarangRequest $b)
    {
        $id_pemilik = $k->get('id_pemilik');

        // request kejadian
        $hari= $k->hari;
        $waktu= $k->waktu;
        $tanggal= $k->tanggal_kejadian;
        $lokasi= $k->lokasi;
        $keterangan= $k->keterangan;

        // request barang
        $nama_barang = $b->nama_barang;
        $id_kategori = $b->id_kategori;
        $ciri_ciri = $b->ciri_ciri;

        // simpan data kejadian
        $kejadian = new Kejadian;
        $kejadian->hari= $hari;
        $kejadian->tanggal= $tanggal;
        $kejadian->waktu= $waktu;
        $kejadian->lokasi= $lokasi;
        $kejadian->keterangan= $keterangan;
        $kejadian->save();

        // ambil id_kjadian
        $kejadian = Kejadian::orderBy('created_at', 'desc')->first();
        $id_kejadian = $kejadian->id_kejadian;

        // get user petugas
        $username = Auth::user()->username;
        $id_petugas = Petugas::where('username', $username)->first();
        $id_petugas = $id_petugas->id_petugas;

        // simpan proses
        $proses = new Proses;
        $proses->id_petugas= $id_petugas;
        $proses->id_pemilik= $id_pemilik;
        $proses->id_kejadian= $id_kejadian;
        $proses->save();




        $barang = new Barang;
        $barang->id_kategori = $id_kategori;
        $barang->nama = $nama_barang;
        $barang->ciri_ciri = $ciri_ciri;
        $barang->save();

        // ambl id barang terbaru untuk disimpan ke foto dan tabel kehilangan
        $barang = Barang::orderby('updated_at', 'desc')->first();
        $id_barang = $barang->id_barang;

        // dd($id_barang);

        $date = new DateTime();
        $datetosting = $date->format('Y-m-d-H-i-s');
        if(Input::hasFile('foto_barang_1')){
            $foto_barang_1 = $b->file('foto_barang_1')->getClientOriginalName();

            $foto_barang_1_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_1;
            // simpan foto 1
            $foto1 = new Foto;
            $foto1->id_barang= $barang->id_barang;
            $foto1->nama= $foto_barang_1_baru;
            $foto1->save();


            $destination_barang1 = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $b->file('foto_barang_1')->move($destination_barang1, $foto_barang_1_baru);
        }else{
            $foto1 = new Foto;
            $foto1->id_barang= $barang->id_barang;
            $foto1->nama= "barang.png";
            $foto1->save();
        }

        
        if(Input::hasFile('foto_barang_2')){
            $foto_barang_2 = $b->file('foto_barang_2')->getClientOriginalName();

            $foto_barang_2_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_2;
            
            // simpan foto 2
            $foto2 = new Foto;
            $foto2->id_barang= $barang->id_barang;
            $foto2->nama= $foto_barang_2_baru;
            $foto2->save();

            $destination_barang2 = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $b->file('foto_barang_2')->move($destination_barang2, $foto_barang_2_baru);
        }

        if(Input::hasFile('foto_barang_3')){
            $foto_barang_3 = $b->file('foto_barang_3')->getClientOriginalName();

            $foto_barang_3_baru = $id_kategori.'_'.$datetosting.'_'.$foto_barang_3;
            
            // simpan foto 3
            $foto3 = new Foto;
            $foto3->id_barang= $barang->id_barang;
            $foto3->nama= $foto_barang_3_baru;
            $foto3->save();

            $destination_barang3 = public_path() . DIRECTORY_SEPARATOR . 'images/fotobarang';

            $b->file('foto_barang_3')->move($destination_barang3, $foto_barang_3_baru);
        }

           // ambil id proses
        $proses = Proses::orderBy('created_at', 'desc')->first();

        $kehilangan = new Kehilangan;
        $kehilangan->id_barang = $id_barang;
        $kehilangan->id_proses = $proses->id_proses;
        $kehilangan->status_kehilangan = "hilang";
        $kehilangan->save();


        \Flash::success('data penemuan berhasil ditambah');
        return redirect()->route('pengolahan.penemuan.index');

    }


    
    public function show($id_proses)
    {
        $id_proses = $id_proses;
        $penemuans = DB::table('proses')
            ->join('penemuans', 'penemuans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->where('proses.id_proses', '=', $id_proses)
            ->groupBy('proses.id_proses')
            ->get();

        foreach ($penemuans as $p) {
            $id_pemilik = $p->id_pemilik;
            if (isset($id_pemilik)) {
                $pemiliks = Pemilik::where('id_pemilik', $id_pemilik)->first();
                $umur = $this->hitung_umur($pemiliks->tanggal_lahir);
                // dd($umur);
            }else{
                $pemiliks = "kosong";
            }

            $id_penemuan = $p->id_penemuan;
        }
        // dd($penemuans, $pemiliks);

        $barangs = Barang::with('foto')
            ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penemuans.id_proses', '=', $id_proses)
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang','barangs.nama as nama_barang', 'kategoris.nama as kategori','barangs.ciri_ciri', 'penemuans.status_pengambilan')
            ->get();

        
        return view('laf_app_administrator.penemuan.show', compact('penemuans', 'umur', 'barangs', 'pemiliks', 'id_proses'));
    }

    // cetak laporan kehilangan
    public function cetak($id_proses)
    {
        $id_proses = $id_proses;
        $penemuans = DB::table('proses')
            ->join('penemuans', 'penemuans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('petugas', 'proses.id_petugas', '=', 'petugas.id_petugas')
            ->where('proses.id_proses', '=', $id_proses)
            ->groupBy('proses.id_proses')
            ->get();

        foreach ($penemuans as $p) {
            $id_pemilik = $p->id_pemilik;
            if (isset($id_pemilik)) {
                $pemilik = Pemilik::where('id_pemilik', $id_pemilik)->first();
                $umur = $this->hitung_umur($pemilik->tanggal_lahir);
                // dd($umur);
            }else{
                unset($pemilik);
                // \Flash::error('cetak penemuan gagak karena data pemilik masih kosong');
                // return redirect()->route('pengolahan.penemuan.show', $id_proses);
            }

            $id_penemuan = $p->id_penemuan;
        }
        // dd($penemuans, $pemiliks);
        // dd($penemuans);
        $barangs = DB::table('barangs')
            ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penemuans.id_proses', '=', $id_proses)
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang','barangs.nama as nama_barang', 'kategoris.nama as kategori','barangs.ciri_ciri', 'penemuans.status_pengambilan')
            ->get();


        $today = new DateTime();
        $tanggal_surat = $today->format('d-m-Y');

        // dd($pukul_surat);

        // dd($barangs);
        $pdf = PDF::loadView('laf_app_administrator.cetak.cetak_penemuan', compact('penemuans','barangs', 'umur', 'tanggal_surat', 'pemilik'));

        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak_surat_penemuan.pdf');
        
        // return view('laf_app_administrator.cetak.cetak_penemuan', compact('penemuans','barangs', 'umur', 'tanggal_surat', 'pukul_surat'));
    }


    // method hitung umur
    public function hitung_umur($tgl_lahir){
        $today = new DateTime();
        $tanggal_lahir = $tgl_lahir;
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $umur = $today->diff($tanggal_lahir);
        $umur = $umur->y;
        return $umur;
    }

    
}
