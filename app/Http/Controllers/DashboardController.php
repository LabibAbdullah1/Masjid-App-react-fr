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
            return view('dashboard');
        }
            return view('dashboard');
    }
}
