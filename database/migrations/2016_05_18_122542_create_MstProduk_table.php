<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('ref_produk_id');
            $table->string('keterangan');
            $table->integer('mst_cabang_id');
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
        Schema::drop('mst_produk');
    }
}
