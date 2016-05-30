<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefSatuanProdukIdToMstProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_produk', function (Blueprint $table) {
            $table->integer('ref_satuan_produk_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_produk', function (Blueprint $table) {
            $table->dropColumn('ref_satuan_produk_id');
        });
    }
}
