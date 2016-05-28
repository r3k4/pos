<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\SetupVariableRepoInterface;
use App\Models\SetupVariable as Model;

class SetupVariableRepo implements SetupVariableRepoInterface
{

	protected $model;
	public function __construct(Model $model){
		$this->model = $model;
	}


	public function getByVariable($variable)
	{
		return $this->model->where('variable', '=', $variable)->first();
	}

	public function updateByVariable($variable, $value)
	{
		$v = $this->model->where('variable', '=', $variable)->first();
		$v->value = $value;
		$v->save();
		
		return $v;	
	}

	public function deleteByVariable($variable)
	{
		$v = $this->getByVariable($variable);
		$v->delete();
		return 'data variable telah terhapus';
	}


 
}