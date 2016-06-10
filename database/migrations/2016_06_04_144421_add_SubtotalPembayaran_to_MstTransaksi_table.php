<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtotalPembayaranToMstTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_transaksi', function (Blueprint $table) {
            $table->integer('subtotal_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_transaksi', function (Blueprint $table) {
            $table->dropColumn('subtotal_pembayaran');
        });
    }
}
