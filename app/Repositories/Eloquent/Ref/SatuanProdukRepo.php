<?php 

namespace App\Repositories\Eloquent\Ref;

use App\Models\Ref\SatuanProduk as Model;
use App\Repositories\Contracts\Ref\SatuanProdukRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;

class SatuanProdukRepo implements SatuanProdukRepoInterface {

	use defaultRepoTrait, dropdownableRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 
 

}