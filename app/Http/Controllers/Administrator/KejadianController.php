<?php

namespace App\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;

use App\Http\Requests\KejadianRequest;

use App\Kejadian;


class KejadianController extends Controller
{
    public function EditKejadian($id_proses, $id_kejadian)
    {
        $kejadians = Kejadian::where('id_kejadian','=', $id_kejadian)->get();

        // dd($kejadians);
        $id_proses = $id_proses;

        return view('laf_app_administrator.kejadian.edit', compact('kejadians', 'id_proses'));
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
        $kejadians->keterangan = $keterangan;
        $kejadians->save();

        // dd($id_proses);

        \Flash::success('data kejadian berhasil dirubah');
        return redirect()->route('pengolahan.kehilangan.show', $id_proses);
    }
}
