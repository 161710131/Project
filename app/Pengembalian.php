<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians';
    protected $fillable = ['konsumen_id','barang_id','jumlah_pinjam','tanggal_pinjam','tanggal_batas','tanggal_kembali','denda','keterangan'];
    public $timestamps = true;

    public function Konsumen()
	{
		return $this->belongsTo('App\Konsumen','konsumen_id');
    }

    public function Barang()
	{
		return $this->belongsTo('App\Barang','barang_id');
    }
}
