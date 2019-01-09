<?php

namespace App\Http\Controllers;

use App\Konsumen;
use Illuminate\Http\Request;
use App\Traits\SessionFlash;

class KonsumenController extends Controller
{
    use SessionFlash;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        return view('konsumen.index',compact('konsumens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsumen.create');
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
            'nik' => 'required|unique:konsumens',
            'nama' => 'required|',
            'nohp' => 'required|',
            'alamat' => 'required|'
        ]);
        $konsumens = new Konsumen;
        $konsumens->nik = $request->nik;
        $konsumens->nama = $request->nama;
        $konsumens->nohp = $request->nohp;
        $konsumens->alamat = $request->alamat;
        $konsumens->save();
        $this->NotifFlash("success","zmdi zmdi-check","Berhasil,"," Menambah konsumen $konsumens->nama");
            return redirect()->route('konsumen.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konsumens = Konsumen::findorFail($id);
        return view('konsumen.edit',compact('konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nik' => 'required|',
            'nama' => 'required|',
            'nohp' => 'required|',
            'alamat' => 'required|'
        ]);
        $konsumens = Konsumen::find($id);
        $konsumens->nik = $request->nik;
        $konsumens->nama = $request->nama;
        $konsumens->nohp = $request->nohp;
        $konsumens->alamat = $request->alamat;
        $konsumens->save();
        $this->NotifFlash("warning","zmdi zmdi-check","Berhasil,"," Mengubah Data konsumen");
            return redirect()->route('konsumen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
