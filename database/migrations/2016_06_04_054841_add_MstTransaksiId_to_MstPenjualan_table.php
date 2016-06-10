<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMstTransaksiIdToMstPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_penjualan', function (Blueprint $table) {
            $table->integer('mst_transaksi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_penjualan', function (Blueprint $table) {
            $table->dropColumn('mst_transaksi_id');
        });
    }
}
