<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\DetailProduk as Model;
use App\Repositories\Contracts\Mst\DetailProdukRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class DetailProdukRepo implements DetailProdukRepoInterface {

	// CRUD default
	use defaultRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 




}