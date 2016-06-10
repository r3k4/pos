<?php 

namespace App\Repositories\Eloquent\Ref;

use App\Models\Ref\UserLevel as Model;
use App\Repositories\Contracts\Ref\UserLevelRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;

class UserLevelRepo implements UserLevelRepoInterface {

	use defaultRepoTrait, dropdownableRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 
 

}