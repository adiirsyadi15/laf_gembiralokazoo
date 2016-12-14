<?php

namespace App\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;

use App\Http\Requests\KejadianRequest;
use Illuminate\Support\Facades\Route;
use App\Kejadian;


class KejadianController extends Controller
{

    public function EditKejadian($id_proses, $id_kejadian)
    {
        $kejadians = Kejadian::where('id_kejadian','=', $id_kejadian)->get();

        $id_proses = $id_proses;

        // ambil route yg aktf
        $route_name = Route::getCurrentRoute()->getName();

        // dd($route_name);


        // jika route yg aktif pengolahan.kehilangan.editkejadian
        // maka data akan diload view edit_kejadian_kehilangan
        if ($route_name == "pengolahan.kehilangan.editkejadian")
        {
            return view('laf_app_administrator.kejadian.edit_kejadian_kehilangan', compact('kejadians', 'id_proses'));
        } else {
            return view('laf_app_administrator.kejadian.edit_kejadian_penemuan', compact('kejadians', 'id_proses'));
        }


    }

    public function UpdateKejadian(KejadianRequest $request, $id_proses, $id_kejadian)
    {

        // $id_proses = $id_proses;
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
        $kejadians->lokasi = $lokasi;
        $kejadians->keterangan = $keterangan;
        $kejadians->save();

        // dd($id_proses);
        // ambil route yg aktif
        $route_name = Route::getCurrentRoute()->getName();

        // dd($route_name);
        // jika route yg aktf pengolahan.kehilangan.updatekejadian
        // maka data di redirect ke pengolahan.kehilangan.show
        if ($route_name == "pengolahan.kehilangan.updatekejadian")
        {
            \Flash::success('data kejadian berhasil dirubah');
            return redirect()->route('pengolahan.kehilangan.show', $id_proses);
        } else {
            \Flash::success('data kejadian berhasil dirubah');
            return redirect()->route('pengolahan.penemuan.show', $id_proses);
        }
    }
}
