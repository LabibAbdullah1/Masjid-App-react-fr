<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\KategoriKeuangan;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(['layouts.app', 'nama_view_lain'], function ($view) {
            $kategoris = KategoriKeuangan::all();
            $view->with('kategoris', $kategoris);
        });
    }
    // ...
}
