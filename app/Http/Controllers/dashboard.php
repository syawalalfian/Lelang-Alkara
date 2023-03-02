<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\lelang;
use App\Models\history_lelang;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    //
    public function admin()
    {   
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->where('level', 'petugas')->count();
        return view('dashboard.admin')->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'totalpenawaran'=>$historylelangs]);
    }

    public function petugas()
    {
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->where('level', 'petugas')->count();
        return view('dashboard.petugas')->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'totalpenawaran'=>$historylelangs]);
    
    }

    public function masyarakat(barang $barangs)
    {   
        // dd ($barangs);
        $barangs = barang::all();
        $lelangs = lelang::all();
        return view('dashboard.masyarakat', compact('lelangs'));
    }

    
}
