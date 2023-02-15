<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\assets;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('barang.create');
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

        $validateData = $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('barang-image');
        }
            // $nm = $request->image;
            // $namaFile = $nm->getClientOriginalName();

            //     $dtUpload = new barang;
            //     $dtUpload->image = $namaFile;

            //     $nm->move(public_path(), $namaFile);
            //     $dtUpload->save();

            // if($Barang->hasFile('image'))
            //  {
            // $request->file('image')->move(public_path('assets/img/products/'), $request->file('image')->getClientOriginalName());
            // $request = 'assets/img/logo/' . $request->file('image')->getClientOriginalName();
            //  }

            // if($request->hasFile('image')){
            //     $file = $request->file('image');
            //     $fileName = time().'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path('uploads'), $fileName);
            // }
            

            // if($request->hasfile('image')) {
            // $request->file('image')->move(public_path('assets/img/logo/'), $request->file('image')->getClientOriginalName());
            //     }

            // if($request->file('image')){
            //     $file['image'] = $request->fi    le('image')->store('barang.store');
            //     $imagePath = "/assets/img/";
            //     $file['image'] = $request->file('image')->getClientOriginalName();
            // };
               
        // Barang::create(
        //     [
        //         'nama_barang' => Str::lower($request->nama_barang),
        //         'tanggal' => $request->tanggal,
        //         'harga_awal' => $request->harga_awal,
        //         'deskripsi' => Str::lower($request->deskripsi),
        //         'image' => $request->image,
        //     ],
            
        // );  
        Barang::create($validateData);
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
         $barangs = Barang::find($barang->id);
        return view('barang.show', compact('barangs')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'tanggal', 'harga_awal', 'deskripsi', 'image')->where('id', $barang->id)->get();
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        //
        $request->validate(
            [
                'nama_barang' => 'required|min:5|max:25',
                'tanggal' => 'required',
                'harga_awal' => 'required|numeric',
                'deskripsi' => 'required|min:10|max:100',
            ] );

            Barang::where('id', $barang->id)
            ->update([
                'nama_barang' => Str::lower($request->nama_barang),
                'tanggal' => $request->tanggal,
                'harga_awal' => $request->harga_awal,
                'deskripsi' => Str::lower($request->deskripsi),
            ]);

        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
        Barang::destroy($barang->id);
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Dihapus');
    }
}
