<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Transaksi as Model;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class TransaksiRepo implements TransaksiRepoInterface {

	// CRUD default
	use defaultRepoTrait;


	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}






}