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


	public function getByBln($perPage = null, $bln, $thn)
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
                          ->orderBy('id', 'desc')
                          ->get();              
            }else{
                // untuk karyawan
                $q = $this->model                          
                          ->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();
            }
        }else{
            if(\Auth::user()->ref_user_level_id == 1){
            // untuk admin
            $q = $this->model                      
                      ->whereMonth('tgl_pengeluaran', '=', $bln)
                      ->whereYear('tgl_pengeluaran', '=', $thn)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage);                         
            }else{
                $q = $this->model
                		  ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->paginate($perPage);             
            }
        }
        
      }else{
         $q = $this->model->whereMonth('tgl_pengeluaran', '=', $bln)
                          ->whereYear('tgl_pengeluaran', '=', $thn)
                          ->orderBy('id', 'desc')
                          ->get();    

      }
        return $q;
	}


	public function getByTgl($perPage = null, $tgl)
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
                          ->get();              
            }else{
                // untuk karyawan
                $q = $this->model                          
                          ->where('tgl_pengeluaran', '=', $tgl)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();
            }
        }else{
            if(\Auth::user()->ref_user_level_id == 1){
            // untuk admin
            $q = $this->model                      
                      ->where('tgl_pengeluaran', '=', $tgl)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage);                         
            }else{
                $q = $this->model
                		  ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->where('tgl_pengeluaran', '=', $tgl)
                          ->paginate($perPage);             
            }
        }
        
      }else{
         $q = $this->model->where('tgl_pengeluaran', '=', $tgl)
                          ->orderBy('id', 'desc')
                          ->get();    

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