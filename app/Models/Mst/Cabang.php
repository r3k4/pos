<?php

namespace App\Models\Mst;


use App\Models\Mst\Pengeluaran;
use App\Models\Mst\Penjualan;
use App\Models\Mst\Produk;
use App\Models\Mst\Transaksi;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'mst_cabang';
    protected $fillable = ['nama', 'kode_cabang', 'no_tlp', 'alamat', 'keterangan'];

    public function mst_user()
    {
        return $this->hasMany(User::class, 'mst_cabang_id');
    }

    public function mst_produk()
    {
    	return $this->hasMany(Produk::class, 'mst_cabang_id');
    }

 
    public function mst_pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'mst_cabang_id');
    }

    public function mst_penjualan()
    {
        return $this->hasMany(Penjualan::class, 'mst_cabang_id');
    }

    public function mst_transaksi()
    {
        return $this->hasMany(Transaksi::class, 'mst_cabang_id');
    }

}
