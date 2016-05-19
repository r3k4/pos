<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\User as Model;
use App\Repositories\Contracts\Mst\UserInterface;

class UserRepo implements UserInterface {

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

	public function all($perPage = null, array $filter = [])
	{
		if($perPage == null){
			$q = $this->model->where($filter)->get();
		}else{
			$q = $this->model->where($filter)->paginate($perPage);
		}
		return $q;
	}


	public function find($id)
	{
		return $this->model->find($id);
	}



	public function create(array $data)
	{
		return $this->model->create($data);
	}


	public function update($id, array $data)
	{
        $update = $this->model->where('id', '=', $id)->update($data);
        $u = $this->model->find($id);

        if(array_has($data, 'password')){
        	$u->password = $u->password;
        	$u->save();
        }
	}


	public function delete($id)
	{
		$q = $this->find($id);
		$q->delete();
		return 'data telah terhapus';
	}


	public function count(array $filter = [])
	{
		return $this->model->where($filter)->count();
	}




}