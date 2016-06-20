<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Produk as Model;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;


class ProdukRepo implements ProdukRepoInterface {

	// CRUD default
	use defaultRepoTrait, dropdownableRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}
 


    /**
     * get all record and record with pagination
     * 
     * @param  integer $perPage 
     * @return void         
     */
    public function all($perPage = null, array $filter = [])
    {
      // jika tanpa browser
      if(\Auth::check()){
        // logged in
        if($perPage == null){
            if(\Auth::user()->ref_user_level_id == 1){
                // untuk admin
                $q = $this->model
                          ->where($filter)
                          ->orderBy('id', 'desc')
                          ->get();              
            }else{
                // untuk karyawan
                $q = $this->model
                          ->where($filter)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->get();
            }
        }else{
            if(\Auth::user()->ref_user_level_id == 1){
            // untuk admin
            $q = $this->model
                      ->where($filter)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage);                         
            }else{
                $q = $this->model
                          ->where($filter)
                          ->where('mst_cabang_id', '=', \Auth::user()->mst_cabang_id)
                          ->orderBy('id', 'desc')
                          ->paginate($perPage);             
            }
        }
        
      }else{
         $q = $this->model
                        ->where($filter)
                        ->orderBy('id', 'desc')
                        ->get();    

      }
        return $q;
    }


	public function create(array $data)
	{
		$data = array_add($data, 'sku', $this->model->getNextSku($data['mst_cabang_id']));

        $create_produk = $this->model->create($data);

        if(isset($data['mst_user_id'])){
          $mst_user_id = $data['mst_user_id'];
        }else{
          $mst_user_id = \Auth::user()->id;
        }

        // menyambungkan ke stok barang
        if(isset($data['stok_barang'])){
            if($data['stok_barang'] > 0){
                $s_obj = app('App\Repositories\Contracts\Mst\HistoryStokRepoInterface');
                $data_stok = ['mst_produk_id'   => $create_produk->id,
                              'stok_masuk'      => $data['stok_barang'],
                              'stok_sisa'       => $data['stok_barang'],
                              'keterangan'      => 'stok awal',
                              'mst_user_id'     => $mst_user_id
                            ];
                $s_obj->create($data_stok);
            }
        }
		return $create_produk;
	}
 

    public function getTotalJmlStok($mst_cabang_id = null)
    {
      if($mst_cabang_id == null){
        $jml = $this->model->sum('stok_barang');        
      }else{
        $jml = $this->model
                    ->where('mst_cabang_id', '=', $mst_cabang_id)
                    ->sum('stok_barang');
      }
      return $jml;
    }



  public function delete($id)
  {
    $q = $this->find($id);
    if(count($q)>0){

      $q->mst_history_stok()->delete();
      $q->mst_penjualan()->delete();
    
      $q->delete();
      return 'data telah terhapus';     
    }
    return 'data dengan ID '.$id.' tidak ditemukan';
  }



}