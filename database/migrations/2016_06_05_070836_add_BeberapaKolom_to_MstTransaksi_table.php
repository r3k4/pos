<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBeberapaKolomToMstTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_transaksi', function (Blueprint $table) {
            $table->integer('bayar');
            $table->integer('nominal_kembalian');
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
            $table->dropColumn('bayar');
            $table->dropColumn('nominal_kembalian');
        });
    }
}
