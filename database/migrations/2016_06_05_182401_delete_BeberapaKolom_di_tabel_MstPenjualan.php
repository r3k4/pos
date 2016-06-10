<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteBeberapaKolomDiTabelMstPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_penjualan', function (Blueprint $table) {

            // hapus kolom keterangan
            $table->dropColumn('keterangan');
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
            $table->string('keterangan');
        });
    }
}
