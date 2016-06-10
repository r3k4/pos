<?php

namespace App\Jobs\Transaksi;

use App\Jobs\Job;

class AddToCartJob extends Job
{

    public $mst_produk_id;

    public $nama;
    public $jml;
    public $harga;
    public $sku;
    public $base_view;

    public function __construct($mst_produk_id, $nama, $jml, $harga, $sku, $base_view)
    {
        $this->base_view = $base_view;
        $this->nama = $nama;
        $this->jml = $jml;
        $this->harga = $harga;
        $this->sku = $sku;
        $this->mst_produk_id = $mst_produk_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
        $produk = $p_obj->find($this->mst_produk_id);        
        $check = $this->check();
        if($check == 0){
            $errors = ['error' => ['stok item '.$produk->nama.' telah habis']];
            return response()->json($errors, 422);        
        }else{
            $trx = $this->insert()->view();
            return $trx;
        }
    }



    private function check()
    {
        $p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
        $produk = $p_obj->find($this->mst_produk_id);
        $stok = $produk->stok_barang;

        // check jml stok yg ada di konten cart
        $filter = ['id' => $this->mst_produk_id];
        $check_cart_konten = \Cart::search($filter);
        if($check_cart_konten != false){
            // jika sudah ada, maka lanjut check
            $get_cart_konten = \Cart::get($check_cart_konten[0]);
            $stok_br = $stok - $get_cart_konten->qty;
            if($stok_br == 0){                
                return 0;
            }
        }
        return 1;
    }



    private function insert()
    {
        // insert ke dlm keranjang belanja
        $insert_cart = \Cart::add($this->mst_produk_id, 
                                  $this->nama, 
                                  $this->jml, 
                                  $this->harga, 
                                  [
                                    'sku' => $this->sku
                                  ]);
        return $this;        
    }

    private function view()
    {
        return view($this->base_view.'karyawan.list_pembelian');        
    }


}
