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
		'uang_diterima',
		'uang_kembalian',
		'subtotal_uang_diterima',
		'mst_user_id',
		'keterangan',
		'mst_cabang_id',
        'mst_transaksi_id'
    ];

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
