<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\lelang;
use App\Models\history_lelang;
use App\Models\User;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function laporanlelang(){
    
        $historyLelangs = history_lelang::orderBy('harga', 'desc')->get();
        $lelangs = Lelang::all();
        $barangs = Barang::all();
        $users = User::all();
        return view('laporan.laporandata', compact('users','historyLelangs','lelangs','barangs'));

}
    public function cetakpdf(){
    $historylelangs = history_lelang::orderBy('harga', 'desc')->get();
    $pdf = PDF  ::loadView('laporan.cetaklaporan', ['cetakhistory' => $historylelangs]);
    $pdf->setPaper('A4', 'potrait');
    return $pdf->download('laporan_datapenawaran.pdf');
}   

}


