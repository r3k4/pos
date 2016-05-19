<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_detail_produk_id'); //relasi ke tabel detail_produk
            $table->integer('harga_produk');
            $table->integer('uang_diterima');
            $table->integer('uang_kembalian');
            $table->integer('subtotal_uang_diterima');
            $table->integer('mst_user_id'); //relasi ke tabel user
            $table->string('keterangan');
            $table->integer('mst_cabang_id'); //relasi ke tabel cabang
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
        Schema::drop('mst_penjualan');
    }
}
