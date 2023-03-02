<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\barang;
Use App\Models\user;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $userspetugas = User::all()->where('level', 'petugas');
        return view('Datapetugas.index',compact('users','userspetugas'));
    }

    public function dataadmin()
    {
        $users = User::all();
        $usersadmin = User::all()->where('level', 'admin');
        return view('Datapetugas.indexadmin',compact('users','usersadmin'));
    }

    public function datamasyarakat()
    {
        $users = User::all();
        $usersmasyarakat = User::all()->where('level','masyarakat');
        return view('Datapetugas.indexmasyarakat',compact('users','usersmasyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Datapetugas.create');
    }
    public function createadmin()
    {
        //
        return view('Datapetugas.createadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $data = $request->validate([
            'name' => 'required|unique:users,name|min:3|max:50',
            'username' => 'required|unique:users,username|max:15',
            'level' => 'required',
            'password' => 'required|min:4',
            'telepon' => 'required|max:15',
        ],  
        [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama terlalu pendek',
            'name.unique' => 'Nama sudah terdaftar',
            'username.required' => 'Username tidak boleh kosong',
            'level.required' => 'Level tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username terlalu panjang',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password terlalu pendek',
            'telepon.max' => 'No telp terlalu panjang',
            'telepon.required' => 'No telp tidak boleh kosong',
        ]
    );

        User::create([
            'name' => ($data['name']),
            'username' => ($data['username']),
            'level' => ($data['level']),
            'password' => bcrypt($data['password']),
            'telepon' => ($data['telepon']),
        ]);

        return redirect()->route('petugas.index')->with('success','Data Akun Berhasil Dibuat');
    

    }

    public function dataadminstore(Request $request)
    {
        //
         $data = $request->validate([
            'name' => 'required|unique:users,name|min:3|max:50',
            'username' => 'required|unique:users,username|max:15',
            'level' => 'required',
            'password' => 'required|min:4',
            'telepon' => 'required|max:15',
        ],  
        [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama terlalu pendek',
            'name.unique' => 'Nama sudah terdaftar',
            'username.required' => 'Username tidak boleh kosong',
            'level.required' => 'Level tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username terlalu panjang',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password terlalu pendek',
            'telepon.max' => 'No telp terlalu panjang',
            'telepon.required' => 'No telp tidak boleh kosong',
        ]
    );

        User::create([
            'name' => ($data['name']),
            'username' => ($data['username']),
            'level' => ($data['level']),
            'password' => bcrypt($data['password']),
            'telepon' => ($data['telepon']),
        ]);

        return redirect()->route('dataadmin.index')->with('success','Data Akun Berhasil Dibuat');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $users = User::find($user->id);
        return view('Datapetugas.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
        $users = User::find($user->id);
        $users->delete();
        return redirect('Admin/Datapetugas')->with('deletesuccess','Data Akun Berhasil Dihapus');
    }
    public function hapuskan(user $user)
    {
        //
        $users = User::find($user->id);
        $users->delete();
        return redirect()->route('dataadmin.index')->with('deletesuccess','Data Akun Berhasil Dihapus');
    }

    public function profile()
    {  
         
        return view('penawaran.profile');
    }
}
