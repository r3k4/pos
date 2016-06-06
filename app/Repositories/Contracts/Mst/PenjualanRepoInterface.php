<?php 

namespace App\Repositories\Contracts\Mst;

interface PenjualanRepoInterface 
{

 	public function countJmlItemTerjual($tgl);

	public function getNominalHargaJualBulanan($mst_cabang_id = null, $bln, $thn);

}