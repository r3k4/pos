<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstDetailProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_detail_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('sku');
            $table->integer('mst_produk_id');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('harga_reseller');
            $table->integer('mst_cabang_id');
            $table->integer('stok_barang');
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
        Schema::drop('mst_detail_produk');
    }
}
