<?php

namespace App\Models\Mst;

use App\Models\Mst\Produk;
use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    protected $table = 'mst_history_stok';
    protected $fillable = ['mst_produk_id', 'stok_masuk',
    					    'stok_keluar', 'stok_sisa',
    					   'mst_user_id', 'keterangan',
    					  ];

    public function mst_produk()
    {
    	return $this->belongsTo(Produk::class, 'mst_produk_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

}
