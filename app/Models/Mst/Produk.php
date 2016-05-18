<?php

namespace App\Models\Mst;
use App\Models\Ref\Produk as refProduk;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'mst_produk';
    protected $fillable = ['nama', 'ref_produk_id', 'keterangan', 'mst_cabang_id'];

    public function ref_produk()
    {
    	return $this->belongsTo(refProduk::class, 'ref_produk_id');
    }
}
