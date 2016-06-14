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


	public function getByBln($perPage = null, $bln, $thn, $mst_cabang_id = null)
	{


     // jika tanpa browser
      if(\Auth::check()){
        // logged in
        if($perPage == null){
            if(\Auth::user()->ref_user_level_id == 1){
                // untuk admin
                $q = $this->model                          
                          ->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();              
            }else{
                // untuk karyawan
                $q = $this->model                          
                          ->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();
            }
        }else{
            if(\Auth::user()->ref_user_level_id == 1){
            // untuk admin
            $q = $this->model                      
                      ->whereMonth('tgl_pengeluaran', '=', $bln)
                      ->whereYear('tgl_pengeluaran', '=', $thn)
                      ->where('mst_cabang_id', '=', $mst_cabang_id)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage);                         
            }else{
                $q = $this->model
                		  ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->paginate($perPage);             
            }
        }
        
      }else{
         $q = $this->model->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();    

      }
        return $q;
	}


	public function getByTgl($perPage = null, $tgl, $mst_cabang_id = null)
	{


      // jika tanpa browser
      if(\Auth::check()){
        // logged in
        if($perPage == null){
            if(\Auth::user()->ref_user_level_id == 1){
                // untuk admin
                $q = $this->model                          
                          ->where('tgl_pengeluaran', '=', $tgl)
                          ->orderBy('id', 'desc')
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->get();              
            }else{
                // untuk karyawan
                $q = $this->model                          
                          ->where('tgl_pengeluaran', '=', $tgl)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->get();
            }
        }else{
            if(\Auth::user()->ref_user_level_id == 1){
            // untuk admin
            $q = $this->model                      
                      ->where('tgl_pengeluaran', '=', $tgl)
                      ->orderBy('id', 'desc')
                      ->where('mst_cabang_id', '=', $mst_cabang_id)
                      ->paginate($perPage);                         
            }else{
                $q = $this->model
                		  ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->where('tgl_pengeluaran', '=', $tgl)
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->paginate($perPage);             
            }
        }
        
      }else{
         $q = $this->model->where('tgl_pengeluaran', '=', $tgl)
                          ->orderBy('id', 'desc')
                          ->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->get();    

      }
        return $q;
	}


  public function getJmlPengeluaranTahunan($mst_cabang_id = null, $thn)
  {
    if($mst_cabang_id == 'all'){
      $mst_cabang_id = null;
    }
    
    if($mst_cabang_id == null){
      $q = $this->model->whereYear('tgl_pengeluaran', '=', $thn)
                       ->sum('subtotal_biaya');
    }else{
      $q = $this->model->where('mst_cabang_id', '=', $mst_cabang_id)
                       ->whereYear('tgl_pengeluaran', '=', $thn)
                       ->sum('subtotal_biaya');
    }
    if(count($q)<=0){
      return 0;
    }
    return $q;
  }



	public function getJmlPengeluaranBulanan($mst_cabang_id = null, $bln, $thn)
	{
    if($mst_cabang_id == 'all'){
      $mst_cabang_id = null;
    }
    
    if($mst_cabang_id == null){
      $q = $this->model
                ->whereMonth('tgl_pengeluaran', '=', $bln)
                ->whereYear('tgl_pengeluaran', '=', $thn)
                ->sum('subtotal_biaya');
    }else{
      $q = $this->model
                ->whereMonth('tgl_pengeluaran', '=', $bln)
                ->where('mst_cabang_id', '=', $mst_cabang_id)
                ->whereYear('tgl_pengeluaran', '=', $thn)
                ->sum('subtotal_biaya');
    }
		if(count($q)<=0){
			return 0;
		}
		return $q;
	}


  public function getJmlPengeluaranHarian($tgl, $mst_cabang_id = null)
  {
    if($mst_cabang_id == null){
      $q = $this->model->where('tgl_pengeluaran', '=', $tgl)->sum('subtotal_biaya');      
    }else{
      $q = $this->model->where('tgl_pengeluaran', '=', $tgl)
                       ->where('mst_cabang_id', '=', $mst_cabang_id)
                       ->sum('subtotal_biaya');      
    }
    if(count($q)<=0){
      return 0;
    }
    return $q;
  }



}