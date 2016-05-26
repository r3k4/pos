<?php

namespace App\Models\Mst;

use App\Models\Mst\Cabang;
use App\Models\Mst\Produk;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    protected $table = 'mst_detail_produk';
    protected $fillable = ['nama', 'sku', 'barcode', 'mst_produk_id', 'harga_beli', 
    					   'harga_jual', 'harga_reseller', 'mst_cabang_id', 
    					   'stok_barang'
    					  ];

    protected $appends = ['fk__mst_produk', 'fk__mst_cabang'];

    public function getFkMstProdukAttribute()
    {
        $p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
        $p = $p_obj->find($this->attributes['mst_produk_id']);
        if(count($p)>0){
            return $p->nama;
        }
    }


    public function getFkMstCabangAttribute()
    {
        $cb_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
        $cb = $cb_obj->find($this->attributes['mst_cabang_id']);
        if(count($cb)>0){
            return $cb->nama;
        }
    }




    public function mst_produk()
    {
    	return $this->belongsTo(Produk::class, 'mst_produk_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }



}
