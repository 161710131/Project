<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = ['konsumen_id','barang_id','jumlah_pinjam','tanggal_batas'];
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
