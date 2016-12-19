<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use App\kategori;

class FilterComposer 
{
        public function compose(View $view)	
        {
        	$kategoris = Kategori::all();

        	$view->with('kategoris', $kategoris);
        }
}