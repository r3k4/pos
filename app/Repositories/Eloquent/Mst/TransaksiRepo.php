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

		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
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
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}				
		$data = [];
		for($i=1;$i<=12;$i++){
			// query
			if($mst_cabang_id == null){
				$q = $this->model->whereYear('created_at', '=', $thn)
								 ->whereMonth('created_at', '=', $i)
								 ->count();
			}else{
				$q = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
								 ->whereYear('created_at', '=', $thn)
								 ->whereMonth('created_at', '=', $i)
								 ->count();			
			}
			// end of query

			$data[$i] = $q;
		}
		$data = collect($data);

		return $data;
	}


	public function getNominalTransaksiTahunan($mst_cabang_id = null, $thn)
	{
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}		

		if($mst_cabang_id == null){
			$q = $this->model->whereYear('created_at', '=', $thn)
							 ->sum('subtotal_pembayaran');
		}else{
			$q = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('subtotal_pembayaran');			
		}		
		return $q;
	}

	public function getNominalTransaksiBulanan($mst_cabang_id = null, $bln, $thn)
	{

		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}		

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



	public function getListNominalTransaksiBulanan($mst_cabang_id = null, $thn)
	{
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}
		
		$data = [];
		for($i=1;$i<=12;$i++){

				if($mst_cabang_id == null){
					$jml_nominal = $this->model
										->whereMonth('created_at', '=', $i)
										->whereYear('created_at', '=', $thn)
										->sum('subtotal_pembayaran');
				}else{
					$jml_nominal = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
										->whereMonth('created_at', '=', $i)
										->whereYear('created_at', '=', $thn)
									 	->sum('subtotal_pembayaran');			
				}
				$data[$i] = $jml_nominal;
		}
		$data = collect($data);

		return $data;		
	}


	public function getNominalPotonganBulanan($mst_cabang_id = null, $bln, $thn)
	{

		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}		

		if($mst_cabang_id == null){
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('diskon');
		}else{
			$q = $this->model->whereMonth('created_at', '=', $bln)
							 ->where('mst_cabang_id', '=', $mst_cabang_id)
							 ->whereYear('created_at', '=', $thn)
							 ->sum('diskon');			
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
		if($mst_cabang_id == 'all'){
			$mst_cabang_id = null;
		}
		
		$data = [];
		for($i=1;$i<=date('d');$i++){
			$tgl = date('Y-m-d', strtotime($thn.'-'.$bln.'-'.$i));

				if($mst_cabang_id == null){
					$jml_nominal = $this->model
										->where('created_at', 'like', $tgl.'%')
										->sum('subtotal_pembayaran');
				}else{
					$jml_nominal = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
										->where('created_at', 'like', $tgl.'%')
									 	->sum('subtotal_pembayaran');			
				}
				$data[$i] = $jml_nominal;
		}
		$data = collect($data);

		return $data;
	}

	public function delete($id)
	{
		$q = $this->find($id);
		if(count($q)>0){
			// delete relasi tabel
			$q->mst_penjualan()->delete();
			$q->delete();
			return 'data telah terhapus';			
		}
		return 'data dengan ID '.$id.' tidak ditemukan';
	}



}