<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\lelang;

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

    public function masyarakat(barang $barangs)
    {   
        // dd ($barangs);
        $barangs = barang::all();
        $lelangs = lelang::all();
        return view('dashboard.masyarakat', compact('lelangs'));
    }
    
    
}
