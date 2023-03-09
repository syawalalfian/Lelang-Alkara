<?php

namespace App\Http\Controllers;

use App\Models\lelang;
use App\Models\Barang;
use App\Models\User;
use App\Models\history_lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lelangs = Lelang::all();
        $barangs = Barang::select('id', 'nama_barang', 'harga_awal')
                    ->whereNotIn('id', function($query)
                    {
                        $query->select('barangs_id')->from('lelangs');
                    })->get();
        return view('lelang.index', compact('lelangs','barangs'));
    }

    public function datanavbar(){
        $lelangs = Lelang::all();
        return view ('template.partials.navbar', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'harga_awal')
                    ->whereNotIn('id', function($query)
                    {
                        $query->select('barangs_id')->from('lelangs');
                    })->get();
        return view('lelang.index', compact('barangs'));
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
        $request->validate(
            [
                'barangs_id'         => 'required|exists:barangs,id|unique:lelangs,barangs_id',
                'tanggal_lelang'    => 'required|date',
            ],
            [
                'barang_id.required'        => 'Barang Harus Diisi',
                'barang_id.exists'          => 'Barang Tidak Ada Pada Data Barang',
                'barang_id.unique'          => 'Barang Sudah Di Lelang',
                'tanggal_lelang.required'   => 'Tanggal Lelang Harus Diisi',
                'tanggal_lelang.date'       => 'Tanggal Lelang Harus Berupa Tanggal',
                
            ]
        );
        $lelang = new Lelang;
        $lelang->barangs_id = $request->barangs_id;
        $lelang->tanggal_lelang = $request->tanggal_lelang;
        $lelang->harga_akhir = '0';
        $lelang->pemenang = 'Belum Ada';
        $lelang->users_id = Auth::user()->id;
        $lelang->status = 'tutup';
        $lelang->save();

        Alert::toast('Barang Lelang Berhasil Ditambahkan','success')->timerProgressBar()->autoClose(3000);
        return redirect()->route('lelang.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(lelang $lelang)
    {
        //
        
        $historyLelangs = History_lelang::orderBy('harga', 'desc')->get()->where('lelang_id', $lelang->id);
        $lelangs = Lelang::find($lelang->id);   
        return view('lelang.show', compact('lelangs', 'historyLelangs')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(lelang $lelang, User $user)
    {
        //
         $lelangs = Lelang::find($lelang->id);
         $users = User::find($user->id);
         $historyLelangs = History_lelang::orderBy('harga', 'desc')->get()->where('lelang_id', $lelang->id);
        return view('lelang.edit', compact('lelangs', 'historyLelangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lelang $lelang)
    {
        //
        $request->validate([
            'status' => 'required'
        ]
    );

    
        $lelang= Lelang::find($lelang->id);
        $lelang->status = $request->status;
        $lelang->update();

            Alert::toast('Status Lelang Berhasil DiUbah','success')->timerProgressBar()->autoClose(3000);
            
        return redirect()->route('lelang.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(lelang $lelang)
    {
        //
        $lelangs = Lelang::select('id','barangs_id','tanggal_lelang','harga_akhir','status')->get();
        return view('listlelang.index', compact('lelangs'));
    }
}
