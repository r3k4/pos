<?php 

namespace App\Repositories\Eloquent\Ref;

use App\Models\Ref\Produk as Model;
use App\Repositories\Contracts\Ref\ProdukRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;

class ProdukRepo implements ProdukRepoInterface {

	use defaultRepoTrait, dropdownableRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 
 

}