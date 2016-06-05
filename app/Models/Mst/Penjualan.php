<?php

namespace App\Models\Mst;

use App\Models\Mst\Produk;
use App\Models\Mst\Transaksi;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{

	
    protected $table = 'mst_penjualan';
    protected $fillable = [
		'mst_produk_id',
		'harga_produk',
        'harga_beli_produk', //harga beli(kulakan)
		'uang_diterima', //uang diterima dr harga satuan produk
		'subtotal_uang_diterima', //total uang diterima * qty
		'mst_user_id',
		'mst_cabang_id',
        'mst_transaksi_id',
        'qty',
    ];

    protected $appends = [
        'fk__mst_produk'
    ];

    public function setHargaBeliProdukAttribute($value)
    {
        // get one record
        $q_produk = $this->mst_produk;
        if(count($q_produk)>0){
            $this->attributes['harga_beli_produk'] = $q_produk->harga_beli;                        
        }
    }

    public function getFkMstProdukAttribute()
    {
        $p_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
        $p = $p_obj->find($this->attributes['mst_produk_id']);
        if(count($p)>0){
            return $p->nama;
        }
    }

    public function mst_transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'mst_transaksi_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
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
