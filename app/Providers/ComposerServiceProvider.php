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
        // view composer sidebar untuk fotoprofile di administrator
        View::composer('sidebar.sidebar_administrator', 'App\Http\ViewComposer\SidebarAdministrator');


        // view composer sidebar untuk kategori
        View::composer('sidebar.sidebar', 'App\Http\ViewComposer\SidebarKategoriComposer');

        // view composer sidebar untuk kehilangan dan penemuan
        View::composer('sidebar.sidebar_kehilangan_penemuan_baru', 'App\Http\ViewComposer\SidebarKehilanganPenemuanComposer');

        // view composer kehilangan baru
        View::composer('home.kehilangan_baru', 'App\Http\ViewComposer\KehilanganBaruComposer');

        // view composer kehilangan baru
        View::composer('home.penemuan_baru', 'App\Http\ViewComposer\PenemuanBaruComposer');
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
