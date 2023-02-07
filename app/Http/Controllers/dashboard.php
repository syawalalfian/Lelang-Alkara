<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard extends Controller
{
    //
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function petugas()
    {
        return view('dashboard.petugas');
    
    }

    public function masyarakat()
    {
        return view('dashboard.masyarakat');
    }
    
}
