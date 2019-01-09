<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SessionFlash;
use App\Peminjaman;
use App\Konsumen;
use App\Barang;
use App\Pengembalian;
use DateTime;

class PeminjamanController extends Controller
{
    use SessionFlash;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = Peminjaman::all();
        return view('peminjaman.index',compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konsumens = Konsumen::all();
        $barangs = Barang::all();
        return view('peminjaman.create',compact('konsumens','barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'konsumen_id' => 'required|'
        // ]);
        // $peminjamans = new Peminjaman;
        // $peminjamans->konsumen_id = $request->konsumen_id;
        

        // $count_man=count($request->barang_id);
        // for($id = 0; $id < $count_man; $id++){
        //     $peminjamans = new Peminjaman;
        //     $peminjamans->barang_id = $request->barang_id[$id];
        //     $peminjamans->jumlah_pinjam = $request->jumlah_pinjam[$id];
        //     $peminjamans->tanggal_batas = $request->tanggal_batas[$id];
        //     $peminjamans->save();
                
        //     $barang->stock = $barang->stock - $request->jumlah_pinjam[$id];   
        //     $barang->save();

        //         }
        // $peminjamans->barang_id = $request->barang_id;
        // $peminjamans->save();
            

        // return redirect()->route('peminjaman.index');

        // ----------------------------------------- //
        
        $requestFailed=array();
        $requestSuccess=array();
        for($id = 0; $id < count($request->barang_id); $id++){
            $barang = Barang::findOrFail($request->barang_id[$id]);
            if ($barang->stock < $request->jumlah_pinjam[$id]) {
                $requestFailed[]=" Maaf, ".$barang->nama." Yang Akan Di Pinjam Hanya Tersisa ".$barang->stock;
            }else{
                $peminjamans = new Peminjaman;
                $peminjamans->konsumen_id = $request->konsumen_id[$id];
                $peminjamans->barang_id = $request->barang_id[$id];
                $peminjamans->jumlah_pinjam = $request->jumlah_pinjam[$id];
                $peminjamans->tanggal_batas = $request->tanggal_batas[$id];
                $peminjamans->save();
            
                $barang->stock = $barang->stock - $request->jumlah_pinjam[$id];   
                $barang->save();
                $requestSuccess[]=" Berhasil, Meminjam ".$barang->nama." Dengan Jumlah ".$request->jumlah_pinjam[$id];
            }        
        }
        $message= "Rincian Peminjaman :";
        $message.= "<ul>";
        for($i=0; $i<count($requestSuccess);$i++){
            $message.= '<li> '.$requestSuccess[$i].'</li>'; 
        }
        for($i=0; $i<count($requestFailed);$i++){
            $message.= '<font color="red"><li>'.$requestFailed[$i].'</li></font>'; 
        }
        $message.="</ul>";
        $this->NotifFlash("info","fa fa-check","",$message);
        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjamanss
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjamans = Peminjaman::findOrFail($id);
        $konsumens = Konsumen::all();
        $barangs = Barang::all();
        $selectedKonsumen = Peminjaman::findOrFail($id)->id_konsumen;
        $selectedBarang = Peminjaman::findOrFail($id)->barang_id;
        return view('peminjaman.show',compact('peminjamans','konsumens','barangs','selectedKonsumen','selectedBarang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjamanss
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
     * @param  \App\Peminjaman  $peminjamanss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //return $request->konsumen_id;

                $pengembalian = new Pengembalian;
                $pengembalian->konsumen_id = $request->konsumen_id;
                $pengembalian->barang_id = $request->barang_id;
                $pengembalian->jumlah_pinjam = $request->jumlah_pinjam;
                $pengembalian->tanggal_pinjam = $request->tanggal_pinjam;
                $pengembalian->tanggal_batas = $request->tanggal_batas;
                $pengembalian->tanggal_kembali = $request->tanggal_kembali;
                $pengembalian->keterangan = $request->keterangan;
        
                $batasdate = $request->tanggal_batas;
                $kembalidate = $request->tanggal_kembali;
                $datetime1 = new DateTime($batasdate);
                $datetime2 = new DateTime($kembalidate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%r%a');
        
                if ($days > 0) {
                    $denda = $days * 50000;
                } else {
                    $denda = 0;
                }
        
                $pengembalian->denda = $denda;
                $peminjamans = Peminjaman::findOrFail($id);
                $barangs = Barang::findOrFail($request->barang_id);
                $barangs->stock = $barangs->stock + $request->jumlah_pinjam;
        
                $barangs->save();
                $peminjamans->delete();
                $pengembalian->save();
                $this->NotifFlash("success","fa fa-check","Berhasil"," Mengembalikan $barangs->nama");
                return redirect()->route('pengembalian.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjamanss
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $peminjamans = Peminjaman::findOrFail($id);
        // $peminjamans->delete();
        // return redirect()->route('peminjaman.index');
    }
}
