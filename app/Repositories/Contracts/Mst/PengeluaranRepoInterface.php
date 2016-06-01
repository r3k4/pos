<?php 

namespace App\Repositories\Contracts\Mst;

interface PengeluaranRepoInterface 
{
 
	public function getJmlPengeluaranBulanan($bln);

	public function getByBln($perPage = null, $bln);

	public function getByTgl($perPage = null, $tgl);
}