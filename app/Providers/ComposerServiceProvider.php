<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// ambil class view
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // view composer for sidebar untuk kategori
        View::composer('sidebar.sidebar', 'App\Http\ViewComposer\SidebarKategoriComposer');

        // view composer for sidebar untuk kehilangan dan penemuan
        View::composer('sidebar.sidebar_kehilangan_penemuan_baru', 'App\Http\ViewComposer\SidebarKehilanganPenemuanComposer');

        // view composer untuk kehilangan baru
        View::composer('home.kehilangan_baru', 'App\Http\ViewComposer\KehilanganBaruComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
