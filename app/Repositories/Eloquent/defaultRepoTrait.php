<?php 

namespace App\Repositories\Eloquent;

trait defaultRepoTrait {


	/**
	 * get all record and record with pagination
	 * 
	 * @param  integer $perPage 
	 * @return void         
	 */
	public function all($perPage = null, array $filter = [])
	{
		if($perPage == null){
			$q = $this->model
					  ->where($filter)
					  ->orderBy('id', 'desc')
					  ->get();
		}else{
			$q = $this->model
					  ->where($filter)
					  ->orderBy('id', 'desc')
					  ->paginate($perPage);
		}
		return $q;
	}

	/**
	 * find by record by ID
	 * 
	 * @param  [integer] $id 
	 * @return void      
	 */
	public function find($id)
	{
		return $this->model->find($id);
	}


	/**
	 * create new record
	 * 
	 * @param  array  $data  
	 * @return void        
	 */
	public function create(array $data)
	{
		return $this->model->create($data);
	}

	/**
	 * update record by ID
	 * 
	 * @param  integer $id   
	 * @param  array  $data 
	 * @return void       
	 */
	public function update($id, array $data)
	{
        $update = $this->model->where('id', '=', $id)->update($data);
        $u = $this->model->find($id);

        return $u;
	}

	/**
	 * delete record with ID
	 * 
	 * @param  integer $id 
	 * @return string
	 */
	public function delete($id)
	{
		$q = $this->find($id);
		if(count($q)>0){
			$q->delete();
			return 'data telah terhapus';			
		}
		return 'data dengan ID '.$id.' tidak ditemukan';
	}


	/**
	 * count all record
	 * @param  array  $filter  
	 * @return integer   
	 */
	public function count(array $filter = [])
	{
		return $this->model->where($filter)->count();
	}


	public function findBy(array $filter)
	{
		return $this->model->where($filter)->first();
	}



}