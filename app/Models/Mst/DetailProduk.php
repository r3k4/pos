<?php

namespace App\Models\Mst;

use App\Models\Mst\Cabang;
use App\Models\Mst\Produk;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    protected $table = 'mst_detail_produk';
    protected $fillable = ['nama', 'sku', 'mst_produk_id', 'harga_beli', 
    					   'harga_jual', 'harga_reseller', 'mst_cabang_id', 
    					   'stok_barang'
    					  ];

    public function mst_produk()
    {
    	return $this->belongsTo(Produk::class, 'mst_produk_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }



}
