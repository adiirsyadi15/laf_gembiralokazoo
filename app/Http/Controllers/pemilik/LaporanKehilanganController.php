<?php

namespace App\Http\Controllers\pemilik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use \DateTime;

use PDF;

use App\Http\Requests\KejadianRequest;
use App\Http\Requests\BarangRequest;

use App\Kejadian;
use App\Kategori;
use App\Proses;
use App\Kehilangan;
use App\Foto;
use App\Barang;
use App\Pemilik;

use Illuminate\Support\Facades\Input;



class LaporanKehilanganController extends Controller
{
    public function index($id)
    {
        // set parameter kehilangan dengan id username
        $username = $id;


        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('pemiliks.username', 'like','%'.$id.'%')
            ->groupBy('proses.id_proses')
            ->select('proses.id_proses', 'kejadians.tanggal','kejadians.lokasi','kejadians.keterangan')
            ->orderBy('proses.id_proses')
            ->paginate(10);
       // dd($kehilangans);
        return view('laf_app.pemilik.kehilangan_index', compact('kehilangans', 'username'));
    }

    public function tambah($username)
    {
        

        $status = Pemilik::where('username', $username)->first();
        $status = $status->status_verifikasi;

        // dd($status);
        // cek status verifikasi pemilik
        if ($status == 0) {
            \Flash::error('maaf anda belum bisa melakukan penambahan laporan kehilangan karena akun anda belum terverifikasi, lengkapi data dan tunggu sampai diverifikasi');
            return redirect()->route('pemilik.kehilangan', [$username]);
        }else{
            $kategoris = Kategori::lists('nama', 'id_kategori');
            $username = $username;
            return view('laf_app.pemilik.kehilangan_tambah', compact('kategoris', 'username'));
        }

    }

    public function simpan(KejadianRequest $k, BarangRequest $b, $username){
         // dd($_POST);
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

        // get id pemilik
        $pemilik = Pemilik::where('username', $username)->first();
        $id_pemilik = $pemilik->id_pemilik;

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

        // simpan proses
        $proses = new Proses;
        $proses->id_petugas= "P01";
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


        // return view('laf_app.pemilik.kehilangan_index', compact('username'));
        return redirect()->route('pemilik.kehilangan', [$username]);
       
    }

    public function detail($username, $id_proses)
    {
        // set username
        $username = $username;
        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('barangs', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->where('proses.id_proses', '=', $id_proses)
            ->groupBy('proses.id_proses')
            ->get();

        // dd($kehilangans);

        $barangs = DB::table('barangs')
            ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
            ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id_kategori')
            ->where('kehilangans.id_proses', '=', $id_proses)
            ->groupBy('barangs.id_barang')
            ->select('barangs.id_barang','barangs.nama as nama_barang', 'kategoris.nama as kategori','barangs.ciri_ciri', 'kehilangans.status_kehilangan')
            ->get();
        // dd($barangs);
        return view('laf_app.pemilik.kehilangan_detail', compact('kehilangans', 'barangs', 'username'));
    }

    public function EditKejadian($username, $id_proses)
    {
        $status = Pemilik::where('username', $username)->first();
        $status = $status->status_verifikasi;

        // dd($status);
        // cek status verifikasi pemilik
        if ($status == 0) {
            \Flash::error('maaf anda belum bisa melakukan edit data kejadian karena akun anda belum terverifikasi, lengkapi data dan tunggu sampai diverifikasi');
            return redirect()->route('pemilik.kehilangan.detail', [$username, $id_proses]);
        }

        $kejadians = DB::table('proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('pemiliks', 'proses.id_pemilik', '=', 'pemiliks.id_pemilik')
            ->where('proses.id_proses', '=', $id_proses)
            ->where('pemiliks.username', '=', $username)
            ->get();

        // dd($kejadians);

        return view('laf_app.pemilik.kejadian_edit', compact('kejadians'));
    }

    public function UpdateKejadian(KejadianRequest $request, $username, $id_proses)
    {
        
        $hari= $request->hari;
        $waktu= $request->waktu;
        $tanggal= $request->tanggal_kejadian;
        $lokasi= $request->lokasi;
        $keterangan= $request->keterangan;
        $id_kejadian = $_POST['id_kejadian'];

        // dd($id_kejadian);

        $kejadians = Kejadian::where('id_kejadian', $id_kejadian)->first();
        $kejadians->hari = $hari;
        $kejadians->waktu = $waktu;
        $kejadians->tanggal = $tanggal;
        $kejadians->keterangan = $keterangan;
        $kejadians->save();

        \Flash::success('data kejadian berhasil dirubah');
        return redirect()->route('pemilik.kehilangan.detail', [$username, $id_proses]);
    }

    public function cetak($username, $id_proses)
    {
        $pemilik = Pemilik::where('username', $username)->first();
        

        $status = $pemilik->status_verifikasi;

        // dd($pemilik);
        // cek status verifikasi pemilik
        if ($status == 0) {
            \Flash::error('maaf anda belum bisa mencetak laporan kehilangan karena akun anda belum terverifikasi, lengkapi data dan tunggu sampai diverifikasi');
            return redirect()->route('pemilik.kehilangan.detail', [$username, $id_proses]);
        }

        $kehilangans = DB::table('proses')
            ->join('kehilangans', 'kehilangans.id_proses', '=', 'proses.id_proses')
            ->join('kejadians', 'proses.id_kejadian', '=', 'kejadians.id_kejadian')
            ->join('petugas', 'proses.id_petugas', '=', 'petugas.id_petugas')
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

        // umur hitung
        $today = new DateTime();
        $tanggal_lahir = $pemilik->tanggal_lahir;
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $umur = $today->diff($tanggal_lahir);
        $umur = $umur->y;

        $tanggal_surat = $today->format('d-m-Y');
        $pukul_surat = $today->format('H:i');

        // dd($pukul_surat);

        // dd($barangs);
        $pdf = PDF::loadView('laf_app.pemilik.kehilangan_cetak', compact('kehilangans','barangs', 'pemilik', 'umur', 'tanggal_surat', 'pukul_surat'));

        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak_laporan_kehilangan.pdf');
        
        // return view('laf_app.pemilik.kehilangan_cetak', compact('kehilangans','barangs', 'pemilik', 'umur', 'tanggal_surat', 'pukul_surat'));
    }
}
