<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Pengeluaran as Model;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class PengeluaranRepo implements PengeluaranRepoInterface {

	// CRUD default
	use defaultRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}
 


}