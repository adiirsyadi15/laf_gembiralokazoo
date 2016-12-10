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
use App\Proses;
use App\Petugas;
use App\Barang;
use App\Kehilangan;
use App\Foto;

use Illuminate\Support\Facades\Input;

use Auth;
use PDF;

class KehilanganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('pemiliks.nama', 'like','%'.$q.'%')
            ->groupBy('proses.id_proses')
            ->select('proses.id_proses', 'pemiliks.nama', 'kejadians.tanggal','kejadians.lokasi')
            ->orderBy('kejadians.tanggal', 'desc')
            ->paginate(10);
       // dd($kehilangans);
        return view('laf_app_administrator.kehilangan.index', compact('kehilangans', 'q'));

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


            $destination_barang1 = base_path() . '/public/images/fotobarang';

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

            $destination_barang2 = base_path() . '/public/images/fotobarang';

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

            $destination_barang3 = base_path() . '/public/images/fotobarang';

            $b->file('foto_barang_3')->move($destination_barang3, $foto_barang_3_baru);
        }

           // ambil id proses
        $proses = Proses::orderBy('created_at', 'desc')->first();

        $kehilangan = new Kehilangan;
        $kehilangan->id_barang = $id_barang;
        $kehilangan->id_proses = $proses->id_proses;
        $kehilangan->status_kehilangan = "hilang";
        $kehilangan->save();


        \Flash::success('data kehilangan berhasil ditambah');
        return redirect()->route('pengolahan.kehilangan.index');

    }


    
    public function show($id)
    {
        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('proses.id_proses', '=', $id)
            ->groupBy('proses.id_proses')
            ->get();
            // dd($kehilangans);

        // olah umur
        foreach ($kehilangans as $k) {
        	$today = new DateTime();
        	$tanggal_lahir = $k->tanggal_lahir;
        	$tanggal_lahir = new DateTime($tanggal_lahir);
        	$umur = $today->diff($tanggal_lahir);
        	$umur = $umur->y;

        	// get id kehilangan
        	$id_proses = $k->id_proses;
        }
        // dd($umur);

        $barangs = DB::table('barangs')
            ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
            ->where('kehilangans.id_proses', '=', $id_proses)
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang','barangs.nama as nama_barang', 'kategoris.nama as kategori','barangs.ciri_ciri', 'kehilangans.status_kehilangan')
            ->get();

        // $car = array("a","c","ss");
        // dd($barangs, $car);
        $barangs = Barang::get();

        // dd($barangs, $barang_array);
        // dd($barang_array);
        foreach ($barangs as $i => $b ) {
            
            $fotos = DB::table('fotos')
            ->where('fotos.id_barang', '=', $b->id_barang)
            ->get();
            $barangs[$i]['gambar'] = $fotos;
        }
        dd($barangs);
        
        return view('laf_app_administrator.kehilangan.show', compact('kehilangans', 'umur', 'barangs', 'fotos'));
    }

    // cetak laporan kehilangan
    public function cetak($id_proses)
    {

        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('petugas', 'proses.id_petugas', '=', 'petugas.id_petugas')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('proses.id_proses', '=', $id_proses)
            ->groupBy('proses.id_proses')
            ->select('*', 'petugas.nama as nama_petugas')
            ->get();
        // dd($kehilangans);
        $barangs = DB::table('barangs')
            ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
            ->where('kehilangans.id_proses', '=', $id_proses)
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang','barangs.nama as nama_barang', 'kategoris.nama as kategori','barangs.ciri_ciri', 'kehilangans.status_kehilangan')
            ->get();

        foreach ($kehilangans as $k) {
            $pemilik_tanggallahir = $k->tanggal_lahir;
        }
        // umur hitung
        $today = new DateTime();
        $tanggal_lahir = $pemilik_tanggallahir;
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $umur = $today->diff($tanggal_lahir);
        $umur = $umur->y;

        $tanggal_surat = $today->format('d-m-Y');
        $pukul_surat = $today->format('H:i');

        // dd($pukul_surat);

        // dd($barangs);
        $pdf = PDF::loadView('laf_app_administrator.cetak.cetak_kehilangan', compact('kehilangans','barangs', 'umur', 'tanggal_surat', 'pukul_surat'));

        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak_laporan_kehilangan.pdf');
        
        // return view('laf_app.pemilik.kehilangan_cetak', compact('kehilangans','barangs', 'pemilik', 'umur', 'tanggal_surat', 'pukul_surat'));
    }

    
}
