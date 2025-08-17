<?php

namespace App\Providers;

use App\Models\Transaksi;
use App\Models\PesanSaran;
use App\Policies\TransaksiPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
        if (auth::check() && auth::user()->role === 'admin') {
            $unreadCount = PesanSaran::whereNull('feedback')->count();
            $view->with('unreadPesanCount', $unreadCount);
        }
    });
    }
}
