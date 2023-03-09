<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\lelang;
use App\Models\history_lelang;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    //
    public function admin()
    {   
        $users = User::all();
        $barangs1 = Barang::all();
        $barangs = DB::table('barangs')->count();   
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->where('level', '=', 'admin')
            ->orWhere('level', '=', 'petugas')
            ->get()->count();
        $usersoperator = DB::table('users')
            ->where('level', '=', 'admin')
            ->orWhere('level', '=', 'petugas')->paginate(3);
        $usersmasyarakat = DB::table('users')
            ->where('level', '=', 'masyarakat')->get();
        return view('dashboard.admin',compact('users','usersoperator','usersmasyarakat','barangs1'))->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'totalpenawaran'=>$historylelangs]);
    }

    public function petugas()
    {
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $historylelangs = DB::table('history_lelangs')->count();
        $users = DB::table('users')->where('level', 'petugas')->count();
        return view('dashboard.petugas')->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'totalpenawaran'=>$historylelangs]);
    
    }

    public function masyarakat()
    {   
        // dd ($barangs);
        $barangs = barang::all();
        $lelangs = lelang::all()->where('status', 'dibuka');

        $userId = auth()->user()->id; // Mendapatkan ID user yang sedang login
        $isWinner = false;
        foreach ($lelangs as $lelang) {
        if ($lelang->pemenang == $userId) {
            $isWinner = true;
            break;
        }
    }

        return view('dashboard.masyarakat', compact('lelangs', 'isWinner'));

        
    }

    
}
