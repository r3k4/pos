<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiskonAndTotalTanpaPotonganToMstTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_transaksi', function (Blueprint $table) {
            $table->integer('diskon');
            $table->integer('total_tanpa_potongan');
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
            $table->dropColumn('diskon');
            $table->dropColumn('total_tanpa_potongan');
        });
    }
}
