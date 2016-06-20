<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Cabang as Model;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;

class CabangRepo implements CabangRepoInterface {

	// CRUD default
	use defaultRepoTrait, dropdownableRepoTrait;


	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}



	public function delete($id)
	{
		$q = $this->find($id);
		if(count($q)>0){

			// delete relasi
			$q->mst_user()->delete();
			$q->mst_produk()->delete();
			$q->mst_pengeluaran()->delete();
			$q->mst_penjualan()->delete();
			$q->mst_transaksi()->delete();			
 

			$q->delete();
			return 'data telah terhapus';			
		}
		return 'data dengan ID '.$id.' tidak ditemukan';
	}





}