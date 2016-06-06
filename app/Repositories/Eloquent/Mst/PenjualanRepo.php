<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Penjualan as Model;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class PenjualanRepo implements PenjualanRepoInterface {
	
	// CRUD default
	use defaultRepoTrait;


	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}
 

 	public function countJmlItemTerjual($tgl)
 	{
 		$q = $this->model->whereDate('created_at', '=', $tgl)->sum('qty');
 		return $q;
 	}


	public function getNominalHargaJualBulanan($mst_cabang_id = null, $bln, $thn)
	{
		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('harga_beli_produk');
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('harga_beli_produk');			
		}		
		return $q;
	}


}