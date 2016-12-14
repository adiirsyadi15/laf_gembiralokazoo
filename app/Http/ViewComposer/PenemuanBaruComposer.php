<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use App\Barang;

use DB;

class PenemuanBaruComposer 
{
        public function compose(View $view)	
        {

                $penemuan_baru = DB::table('barangs')
                ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
                ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
                ->join('fotos', 'fotos.id_barang', '=', 'barangs.id_barang')
                ->groupby('barangs.id_barang')
                ->orderby('barangs.created_at', 'desc')
                ->select('barangs.id_barang','barangs.nama as nama_barang','fotos.nama as nama_foto','penemuans.status_pengambilan', 'kategoris.nama as nama_kategori', 'penemuans.id_penemuan')
                
                ->limit(10)
                ->get();


                // dd($penemuan_baru);
                $view->with('penemuan_baru', $penemuan_baru);
        }
}