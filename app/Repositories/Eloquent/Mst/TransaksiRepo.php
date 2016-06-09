<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Transaksi as Model;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;

class TransaksiRepo implements TransaksiRepoInterface {

	// CRUD default
	use defaultRepoTrait;


	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}



	public function getJmlTransaksiPerBln($mst_cabang_id = null, $bln, $thn)
	{
		$data = [];
		for($i=1;$i<=date('d');$i++){
			$data[$i] = '';
		}

		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->get();
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->get();			
		}

		foreach($q as $list){
			$tgl =  date('d', strtotime($list->created_at));
			$data[ltrim($tgl, '0')] = $data[ltrim($tgl, '0')]+1;
		}

		$data = collect($data);

		return $data;
	}



	public function getJmlTransaksiPerThn($mst_cabang_id = null, $thn)
	{
		$data = [];
		for($i=1;$i<=12;$i++){
			$data[$i] = '';
		}

		if($mst_cabang_id == null){
			$q = $this->model->whereYear('created_at', '=', $thn)
							 ->get();
		}else{
			$q = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->get();			
		}

		foreach($q as $list){
			$bln =  date('m', strtotime($list->created_at));
			$data[ltrim($bln, '0')] = $data[ltrim($bln, '0')]+1;
		}
		
		$data = collect($data);

		return $data;
	}


	public function getNominalTransaksiBulanan($mst_cabang_id = null, $bln, $thn)
	{
		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('subtotal_pembayaran');
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('subtotal_pembayaran');			
		}		
		return $q;
	}

	public function getTransaksiBulanan($mst_cabang_id = null, $bln, $thn)
	{
		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->get();
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->get();			
		}		
		return $q;		
	}


	public function getNominalTransaksiHarian($mst_cabang_id = null, $bln, $thn)
	{
		$data = [];
		for($i=1;$i<=date('d');$i++){
			$data[$i] = '';
		}

		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->get();
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->get();			
		}

		foreach($q as $list){
			$tgl =  date('d', strtotime($list->created_at));
			$data[ltrim($tgl, '0')] = $data[ltrim($tgl, '0')]+1;
		}

		$data = collect($data);

		return $data;
	}

}