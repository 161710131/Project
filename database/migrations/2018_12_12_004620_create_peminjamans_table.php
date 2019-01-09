<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('konsumen_id');
            $table->foreign('konsumen_id')->references('id')->on('konsumens')->onDelete('CASCADE');
            $table->unsignedInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE');
            $table->biginteger('jumlah_pinjam');
            $table->datetime('tanggal_batas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}
