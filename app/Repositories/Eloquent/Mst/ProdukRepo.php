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
 

	public function create(array $data)
	{
		$data = array_add($data, 'sku', $this->getNextSku($data['mst_cabang_id']));

        $create_produk = $this->model->create($data);

        // menyambungkan ke stok barang
        if(isset($data['stok_barang'])){
            if($data['stok_barang'] > 0){
                $s_obj = app('App\Repositories\Contracts\Mst\HistoryStokRepoInterface');
                $data_stok = ['mst_produk_id'   => $create_produk->id,
                              'stok_masuk'      => $data['stok_barang'],
                              'stok_sisa'       => $data['stok_barang'],
                              'keterangan'      => 'stok awal',
                              'mst_user_id'     => \Auth::user()->id
                            ];
                $s_obj->create($data_stok);
            }
        }


		return $create_produk;
	}


    public function getNextSku($mst_cabang_id)
    {
        $cb_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
        $cb = $cb_obj->find($mst_cabang_id);
        if(count($cb)>0){

            // ambil record terakhir dari tabel di model ini
            $last_record = $this->model
            					->where('mst_cabang_id', '=', $mst_cabang_id)
                                ->orderBy('id', 'DESC')
                                ->first();
            // jika ada record
            if(count($last_record)>0){
                $urut_akhir = str_replace($cb->kode_cabang, "", $last_record->sku);
                 $urut_akhir = $urut_akhir+1;
                if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 10000) $urut_akhir = '0'.$urut_akhir;
               
                // output berupa kode cabang+nomor urut terakhir dr SKU yg ada
                return $cb->kode_cabang.''.$urut_akhir;
            }else{
                // jika record tdk ditemukan, maka nomor urut akhir = 1
                $urut_akhir =  1;
                if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 10000) $urut_akhir = '0'.$urut_akhir;
                // return nomor urut pertama 
                return $cb->kode_cabang.''.$urut_akhir;
            }

        }
        return null;
    }

}