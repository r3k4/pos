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

 
	public function delete($id)
	{
		$q = $this->find($id);
		if(count($q)>0){

			// delete relasi
			$q->mst_history_stok()->delete();
			$q->mst_pengeluaran()->delete();
			$q->mst_penjualan()->delete();
			$q->mst_produk()->delete();
			$q->mst_transaksi()->delete();			

			$q->delete();
			return 'data telah terhapus';			
		}
		return 'data dengan ID '.$id.' tidak ditemukan';
	}

 
}