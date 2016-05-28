<?php 

namespace App\Repositories\Contracts\Mst;

interface ProdukRepoInterface 
{

	public function create(array $data);

	public function getNextSku($mst_cabang_id);


}