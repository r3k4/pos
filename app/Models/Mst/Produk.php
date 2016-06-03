<?php

namespace App\Models\Mst;
use App\Models\Mst\User;
use App\Models\Ref\Produk as refProduk;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'mst_produk';
    protected $fillable = [
        'nama', 'ref_produk_id', 'keterangan', 'mst_cabang_id',
        'sku', 'barcode', 'harga_beli', 'harga_jual', 
        'harga_reseller', 'stok_barang', 'ref_satuan_produk_id',
        'mst_user_id'
    ];
    protected $appends = ['fk__ref_produk', 'fk__mst_cabang', 'fk__ref_satuan_produk'];





    public function mst_user()
    {
        return $this->belongsTo(User::class, 'mst_user_id');
    }


    public function getFkRefSatuanProdukAttribute()
    {
        $s_obj = app('App\Repositories\Contracts\Ref\SatuanProdukRepoInterface');
        $s = $s_obj->find($this->attributes['ref_satuan_produk_id']);
        if(count($s)>0){
            return $s->nama;
        }
    }


    public function getFkMstCabangAttribute()
    {
    	$cb_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
    	$cb = $cb_obj->find($this->attributes['mst_cabang_id']);
    	if(count($cb)>0){
    		return $cb->nama;
    	}
    	return '-kosong-';
    }


    public function getFkRefProdukAttribute()
    {
    	$rp_obj = app('App\Repositories\Contracts\Ref\ProdukRepoInterface');
    	$rp = $rp_obj->find($this->attributes['ref_produk_id']);
    	if(count($rp)>0){
    		return $rp->nama;
    	}
    	return '-kosong-';
    }


    public function ref_produk()
    {
    	return $this->belongsTo(refProduk::class, 'ref_produk_id');
    }
}
