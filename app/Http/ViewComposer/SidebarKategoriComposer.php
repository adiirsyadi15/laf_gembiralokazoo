<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use DB;

class SidebarKategoriComposer 
{
	public function compose(View $view)	
	{
        $kategoris_sidebar = DB::table('kategoris')
            ->whereExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('barangs')
                      ->whereRaw('barangs.id_kategori = kategoris.id_kategori');
            })
            ->orderby('kategoris.nama')
            ->get();
	   $view->with('kategoris_sidebar', $kategoris_sidebar);
	}
}