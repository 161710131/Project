<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table = 'konsumens';
    protected $fillable = ['nik','nama','nohp','alamat']; 
    public $timestamps = true;

    public function Peminjaman(){
        return $this->hasMany('App\Peminjaman');
    }
}
