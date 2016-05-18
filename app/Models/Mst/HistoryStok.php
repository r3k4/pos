<?php

namespace App\Models\Mst;

use App\Models\Mst\DetailProduk;
use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    protected $table = 'mst_history_stok';
    protected $fillable = ['mst_detail_produk_id', 'keterangan', 
    					   'stok_masuk', 'stok_keluar', 'stok_sisa',
    					   'mst_user_id'
    					  ];

    public function mst_detail_produk()
    {
    	return $this->belongsTo(DetailProduk::class, 'mst_detail_produk_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

}
