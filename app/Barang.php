<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['nama','stock','harga','denda','desc','gambar','kategori_id'];
    public $timestamps = true;

    public function kategori()
	{
		return $this->belongsTo('App\Kategori');
    }

}
