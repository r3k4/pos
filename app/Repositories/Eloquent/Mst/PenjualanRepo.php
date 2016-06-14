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
 

 	public function countJmlItemTerjual($tgl, $mst_cabang_id = null)
 	{
 		if($mst_cabang_id == null){
	 		$q = $this->model->whereDate('created_at', '=', $tgl)->sum('qty'); 			
 		}else{
	 		$q = $this->model->whereDate('created_at', '=', $tgl)
	 						 ->where('mst_cabang_id', '=', $mst_cabang_id)
	 						 ->sum('qty'); 			
 		}
 		return $q;
 	}


	public function getNominalHargaJualBulanan($mst_cabang_id = null, $bln, $thn)
	{
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}
		
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


	public function getNominalHargaJualTahunan($mst_cabang_id = null, $thn)
	{
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}
		
		if($mst_cabang_id == null){
			$q = $this->model->whereYear('created_at', '=', $thn)
							 ->sum('harga_beli_produk');
		}else{
			$q = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('harga_beli_produk');			
		}		
		return $q;
	}



}