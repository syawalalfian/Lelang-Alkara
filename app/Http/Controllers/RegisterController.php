<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function view()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:25',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'telepon' => 'required|numeric',
        ], 
    );

        User::create([
            'name' => Str::camel($data['name']),
            'username' => Str::lower($data['username']),
            'password' => bcrypt($data['password']),
            'level' => 'masyarakat',
            'telepon' => $data['telepon'],
        ]);
        return redirect('/login');
    }
}
