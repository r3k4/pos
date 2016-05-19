<?php

namespace App\Models\Mst;

use App\Models\Mst\DetailProduk;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{

	
    protected $table = 'mst_penjualan';
    protected $fillable = [
		'mst_detail_produk_id',
		'harga_produk',
		'uang_diterima',
		'uang_kembalian',
		'subtotal_uang_diterima',
		'mst_user_id',
		'keterangan',
		'mst_cabang_id' 	
    ];

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

    public function mst_detail_produk()
    {
    	return $this->belongsTo(DetailProduk::class, 'mst_detail_produk_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }




}
