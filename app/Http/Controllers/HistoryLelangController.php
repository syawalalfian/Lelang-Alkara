<?php

namespace App\Http\Controllers;

use App\Models\history_lelang;
use Illuminate\Http\Request;
use App\Models\lelang;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;



class HistoryLelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historylelangs = history_lelang::all();
        return view('penawaran.index', compact('historylelangs', 'lelangs','barangs'));
        
    }

    public function datapenawaran(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(History_Lelang $historyLelang, Lelang $lelang )
    {
        //

        $lelangs = Lelang::find($lelang->id);
        $historyLelangs = History_lelang::orderBy('harga', 'desc')->get()->where('lelang_id', $lelang->id);
        return view('masyarakat.penawaran', compact('lelangs', 'historyLelangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, history_lelang $historyLelang, Lelang $lelang, Barang $barang)
    {
        //
         $validatedData = $request->validate([
            'harga_penawaran' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($lelang) {
                    if ($value <= $lelang->barang->harga_awal) {
                        $message = "Harga penawaran harus lebih besar dari harga awal yaitu " . "Rp " . number_format($lelang->barang->harga_awal, 0, ',', '.');
                        Alert::error('Error', $message);
                        return $fail($message);
                    }
                },
            ],
        ], 
        [
            'harga_penawaran.required' => "Harga penawaran harus diisi",
            'harga_penawaran.numeric' => "Harga penawaran harus berupa angka",
        ]);

        $historyLelang = new history_lelang();
        $historyLelang->lelang_id = $lelang->id;
        $historyLelang->users_id = Auth::user()->id;
        $historyLelang->harga = $request->harga_penawaran;
        $historyLelang->status = 'pending';
        $historyLelang->save();

        return redirect()->route('lelangin.create', $lelang->id)->with('toast_success', 'Anda Berhasil Menawar Barang Ini')->with('ucapan','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\history_lelang  $history_lelang
     * @return \Illuminate\Http\Response
     */
    public function show(history_lelang $history_lelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\history_lelang  $history_lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(history_lelang $history_lelang)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\history_lelang  $history_lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, history_lelang $history_lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\history_lelang  $history_lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(history_lelang $history_lelang)
    {
        //
    }
}
