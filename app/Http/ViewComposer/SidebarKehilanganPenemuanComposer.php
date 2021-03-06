<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use DB;

class SidebarKehilanganPenemuanComposer 
{
	public function compose(View $view)	
	{
        $kehilangan_sidebar = DB::table('barangs')
                    ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
                    ->join('kehilangans', 'kehilangans.id_barang', '=', 'barangs.id_barang')
                    ->join('fotos', 'fotos.id_barang', '=', 'barangs.id_barang')
                    ->groupby('barangs.id_barang')
                    ->orderby('barangs.created_at', 'desc')
                    ->select('barangs.id_barang','barangs.nama as nama_barang','fotos.nama as foto','kehilangans.status_kehilangan', 'kategoris.nama as nama_kategori', 'kehilangans.id_kehilangan')
                    ->limit(5)
                    ->get();

        $penemuan_sidebar = DB::table('barangs')
                    ->join('kategoris','barangs.id_kategori','=','kategoris.id_kategori')
                    ->join('penemuans', 'penemuans.id_barang', '=', 'barangs.id_barang')
                    ->join('fotos', 'fotos.id_barang', '=', 'barangs.id_barang')
                    ->groupby('barangs.id_barang')
                    ->orderby('barangs.created_at', 'desc')
                    ->select('barangs.id_barang','barangs.nama as nama_barang','penemuans.status_pengambilan', 'kategoris.nama as nama_kategori', 'penemuans.id_penemuan', 'fotos.nama as foto')
                    ->limit(5)
                    ->get();

        // dd($penemuan_sidebar);
        $view->with('kehilangan_sidebar', $kehilangan_sidebar)
        ->with('penemuan_sidebar', $penemuan_sidebar);
	}
}