<?php 

namespace App\Repositories\Contracts\Mst;

interface PengeluaranRepoInterface 
{
 
	public function getJmlPengeluaranBulanan($bln);

	public function getByBln($perPage = null, $bln, $thn);

	public function getByTgl($perPage = null, $tgl);
}