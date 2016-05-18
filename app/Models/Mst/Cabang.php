<?php

namespace App\Models\Mst;

use App\Models\Mst\DetailProduk;
use App\Models\Mst\Produk;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'mst_cabang';
    protected $fillable = ['nama', 'kode_cabang', 'no_tlp', 'alamat', 'keterangan'];

    public function mst_produk()
    {
    	return $this->hasMany(Produk::class, 'mst_cabang_id');
    }

    public function mst_detail_produk()
    {
    	return $this->hasMany(DetailProduk::class, 'mst_cabang_id');
    }



}
