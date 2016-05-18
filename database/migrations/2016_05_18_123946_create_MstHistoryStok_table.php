<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstHistoryStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_history_stok', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mst_detail_produk_id');
            $table->string('keterangan');
            $table->integer('stok_masuk');
            $table->integer('stok_keluar');
            $table->integer('stok_sisa');
            $table->integer('mst_user_id');
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
        Schema::drop('mst_history_stok');
    }
}
