<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\User as Model;
use App\Repositories\Contracts\Mst\UserRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;


class UserRepo implements  UserRepoInterface {

	// CRUD default
	use defaultRepoTrait;

	
	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 
 
}