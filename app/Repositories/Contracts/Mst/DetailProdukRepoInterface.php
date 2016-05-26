<?php 

namespace App\Repositories\Contracts\Mst;

interface DetailProdukRepoInterface 
{

 	public function create(array $data);

	public function getNextSku($mst_cabang_id);

}