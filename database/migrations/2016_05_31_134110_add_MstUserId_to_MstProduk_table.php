<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMstUserIdToMstProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_produk', function (Blueprint $table) {
            $table->integer('mst_user_id');
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
            $table->dropColumn('mst_user_id');
        });
    }
}
