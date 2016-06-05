<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHargaBeliProdukToMstPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_penjualan', function (Blueprint $table) {
            $table->integer('harga_beli_produk');
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
            $table->dropColumn('harga_beli_produk');
        });
    }
}
