<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Pengeluaran as Model;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class PengeluaranRepo implements PengeluaranRepoInterface {

	// CRUD default
	use defaultRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}


	public function getByBln($perPage = null, $bln)
	{
		if($perPage == null){
			$q = $this->model
					  ->whereMonth('tgl_pengeluaran', '=', $bln)
					  ->orderBy('id', 'desc')
					  ->get();
		}else{
			$q = $this->model
					  ->whereMonth('tgl_pengeluaran', '=', $bln)
					  ->orderBy('id', 'desc')
					  ->paginate($perPage);
		}
		return $q;
	}


	public function getByTgl($perPage = null, $tgl)
	{
		if($perPage == null){
			$q = $this->model
					  ->where('tgl_pengeluaran', '=', $tgl)
					  ->orderBy('id', 'desc')
					  ->get();
		}else{
			$q = $this->model
					  ->where('tgl_pengeluaran', '=', $tgl)
					  ->orderBy('id', 'desc')
					  ->paginate($perPage);
		}
		return $q;	
	}



	public function getJmlPengeluaranBulanan($bln)
	{
		$q = $this->model->whereMonth('tgl_pengeluaran', '=', $bln)->sum('subtotal_biaya');
		if(count($q)<=0){
			return 0;
		}
		return $q;
	}


}