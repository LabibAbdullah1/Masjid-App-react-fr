<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index()
    {
        $user = Auth::user();

        if($user->role === 'admin'){
            return view('admin.dashboard');
        }
            return view('umum.dashboard');
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function umum()
    {
        return view('dashboard.umum');
    }


}
