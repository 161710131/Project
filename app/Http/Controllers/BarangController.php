<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\Peminjaman;
use Illuminate\Http\Request;
use Session;
use File;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $barangs = Barang::with('Kategori')->get();
        return view('barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'stock' => 'required|',
            'harga' => 'required|',
            'denda' => 'required|',
            'desc' => 'required|',
            'gambar' => 'required|',
            'kategori_id' => 'required'
        ]);
        $barangs = new Barang;
        $barangs->nama = $request->nama;
        $barangs->stock = $request->stock;
        $barangs->harga = $request->harga;
        $barangs->denda = $request->denda;
        $barangs->desc = $request->desc;
        $barangs->gambar = $request->gambar;
        // gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/backend/images/gambarbarang/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $barangs->gambar = $filename;
            }
        $barangs->kategori_id = $request->kategori_id;
        $barangs->save();
        
        return redirect()->route('barang.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $selectedKategori = Barang::findOrFail($id)->kategori_id;
        $selected = $barangs->pluck('id')->toArray();
        // $hobi = Hobi::all();
        // dd($selected);
        return view('barang.edit',compact('barangs','kategori','selectedKategori','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request,[
                'nama' => 'required|',
                'stock' => 'required|',
                'harga' => 'required|',
                'denda' => 'required|',
                'desc' => 'required|',
                'gambar' => '',
                'kategori_id' => 'required'
            ]);
            $barangs = Barang::findOrFail($id);
            $barangs->nama = $request->nama;
            $barangs->stock = $request->stock;
            $barangs->harga = $request->harga;
            $barangs->denda = $request->denda;
            $barangs->desc = $request->desc;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $destinationPatch = public_path().'/backend/images/fotobarang/';
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $uploadSucces = $file->move($destinationPatch, $filename);
                $barangs->gambar = $filename;
    
                // hapus gambar lama, jika ada
            if ($barangs->gambar) { 
            $old_foto = $barangs->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/backend/images/fotobarang/'
            . DIRECTORY_SEPARATOR . $barangs->gambar;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
                }
            }
            $barangs->gambar = $filename;
        }
            $barangs->kategori_id = $request->kategori_id;
            $barangs->save();
            return redirect()->route('barang.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoris = Barang::findOrFail($id);
        if ($kategoris->gambar) {
            $old_gambar = $kategoris->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'backend/images/gambarbarang/'
            . DIRECTORY_SEPARATOR . $kategoris->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        $kategoris->delete();
        return redirect()->route('barang.index');
    }
}
