<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\barang;
use App\Models\lelang;


class LoginController extends Controller
{
    //
    public function home(){

        $barangs = Barang::all();
        $lelangs = Lelang::all();
        // dd($barangs);
        return view('welcome', compact('lelangs'));

    }


     public function view()
    {
        return view('auth.login');
    }
    public function proses(Request $request)
    {
        $user = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Silahkan isi username',
            'password.required' => 'Silahkan isi password',
            'username.exists'   => 'Username anda salah'
        ]); 

        // dd(Auth::attempt($user));
if (Auth::attempt($user))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == 'admin')
            {
                return redirect()->route('dashboard.admin');
            } else if ($user->level == 'petugas') {
                return redirect()->route('dashboard.petugas');
                // return redirect()->intended('home');
            } else if ($user->level == 'masyarakat') {
                return redirect()->route('dashboard.masyarakat');
                // return redirect()->intended('/masyarakat/home');
            } else return redirect()->route('login');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    
    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect ('/');
    }
}
