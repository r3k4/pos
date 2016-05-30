<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMstDetailProdukIdToMstProdukIdInMstHistoryStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_history_stok', function (Blueprint $table) {
            $table->renameColumn('mst_detail_produk_id', 'mst_produk_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_history_stok', function (Blueprint $table) {
            $table->renameColumn('mst_produk_id', 'mst_detail_produk_id');
        });
    }
}
