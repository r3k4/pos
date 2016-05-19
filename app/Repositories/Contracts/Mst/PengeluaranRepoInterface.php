<?php 

namespace App\Repositories\Contracts\Mst;

interface PengeluaranRepoInterface 
{

	/**
	 * get all record and record with pagination
	 * 
	 * @param  integer $perPage 
	 * @return void         
	 */
	public function all($perPage = null, array $filter = []);

	/**
	 * find by record by ID
	 * 
	 * @param  [integer] $id 
	 * @return void      
	 */
	public function find($id);

	/**
	 * delete record with ID
	 * 
	 * @param  integer $id 
	 * @return string
	 */
	public function delete($id);

	/**
	 * update record by ID
	 * 
	 * @param  integer $id   
	 * @param  array  $data 
	 * @return void       
	 */
	public function update($id, array $data);

	/**
	 * create new record
	 * 
	 * @param  array  $data  
	 * @return void        
	 */
	public function create(array $data);

	/**
	 * count all record
	 * @return integer
	 */
	public function count(array $filter = []);



}