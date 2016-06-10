<?php

namespace App\Jobs\Produk;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class importProdukJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $lokasi_file;
    public $ref_produk_id;
    public $ref_satuan_produk_id;
    public $mst_cabang_id;
    public $mst_user_id;

    public function __construct($lokasi_file, $ref_produk_id, 
                                $ref_satuan_produk_id, $mst_cabang_id,
                                $mst_user_id
                                ){
        $this->mst_user_id = $mst_user_id;
        $this->lokasi_file = $lokasi_file;
        $this->ref_produk_id = $ref_produk_id;
        $this->ref_satuan_produk_id = $ref_satuan_produk_id;
        $this->mst_cabang_id = $mst_cabang_id;
    }


    public function handle()
    {
        $p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');

        $data = new \Reader($this->lokasi_file);
        $a = $data->rowcount($sheet_index=0); 
    
        for($i=1;$i<=$a;$i++){
            if($i > 2 && $i <= $a){
              $no   = trim($data->val($i, 'B')); // nama produk
              $no2  = trim($data->val($i, 'C')); // barcode
              $no3  = trim($data->val($i, 'D')); // harga beli
              $no4  = trim($data->val($i, 'E')); // harga jual
              $no5  = trim($data->val($i, 'F')); // jml stok barang
              if(
                    $no != null &&
                    $no3 != null && 
                    $no4 != null && 
                    $no5 != null
                ){
                    $data_record = [
                      'nama'                    => $no,
                      'barcode'                 => $no2,
                      'harga_beli'              => $no3,
                      'harga_jual'              => $no4,
                      'stok_barang'             => $no5,
                      'ref_produk_id'           => $this->ref_produk_id,
                      'ref_satuan_produk_id'    => $this->ref_satuan_produk_id,
                      'mst_cabang_id'           => $this->mst_cabang_id,
                      'mst_user_id'             => $this->mst_user_id
                    ];
                    $p_obj->create($data_record);

                    if($i == $a){
                        //hapus file tmp
                        if(file_exists($this->lokasi_file)){
                            unlink($this->lokasi_file);
                        }                       
                    }


                }else{
                   //jika ada kolom yg kurang
                    \Log::alert('ada kolom yg belum terisi, lokasi file : '.$this->lokasi_file);
                  }
              } //if setelah for (keterangan template)

            }//for



    }




}
