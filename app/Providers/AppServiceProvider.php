<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        $produks = Produk::latest()->get();
        view::share('produk_table', $produks);

        $penjualans = Penjualan::where('status', '0')->get();
        view::share('penjualan', $penjualans);

        $user = User::where('username', 'kasir')->get();
        view::share('user', $user);
 
    }
}
