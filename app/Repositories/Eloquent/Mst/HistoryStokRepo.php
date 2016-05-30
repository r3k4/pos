<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\HistoryStok as Model;
use App\Repositories\Contracts\Mst\HistoryStokRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class HistoryStokRepo implements HistoryStokRepoInterface {
	
	// CRUD default
	use defaultRepoTrait;


	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}

 	public function updateStok($mst_produk_id, $jml_stok, $mst_user_id, $keterangan = null)
 	{
 		$p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
 		$p = $p_obj->find($mst_produk_id);
 		if(count($p)>0){
 			$stok_awal = $p->stok_barang;

 			if($stok_awal < $jml_stok){
 				// stok_masuk
 				$stok_masuk = $jml_stok - $stok_awal;
 				$stok_keluar = 0;
 			}else{
 				$stok_keluar = $stok_awal - $jml_stok;
 				$stok_masuk = 0;
 			}


	 		if($stok_keluar == 0){
	 			$stok_sisa = $stok_awal + $stok_masuk;
	 		}else{
	 			$stok_sisa = $stok_awal - $stok_keluar;
	 		}

	 		$data = ['mst_produk_id' 	=> $mst_produk_id,
	 				 'stok_masuk'		=> $stok_masuk,
	 				 'stok_keluar'		=> $stok_keluar,
	 				 'stok_sisa'		=> $stok_sisa,
	 				 'keterangan'		=> $keterangan,
	 				 'mst_user_id'		=> $mst_user_id
	 		];
	 		$insert = $this->model->create($data);
	 		$p_obj->update($mst_produk_id, ['stok_barang' => $stok_sisa]);
	 		return $insert;
 		}else{
 			return null;
 		}
 	}

 

}