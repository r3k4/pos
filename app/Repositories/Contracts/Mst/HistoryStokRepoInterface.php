<?php 

namespace App\Repositories\Contracts\Mst;

interface HistoryStokRepoInterface 
{

 	public function updateStok($mst_produk_id, $jml_stok, $mst_user_id, $keterangan  = null);

}