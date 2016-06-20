<?php

namespace App\Models\Mst;
use App\Models\Mst\HistoryStok;
use App\Models\Mst\Penjualan;
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
    protected $appends = [
            'fk__ref_produk', 'fk__mst_cabang', 'fk__ref_satuan_produk', 
            'fk__ref_produk_warna'
        ];
 

    public function mst_user()
    {
        return $this->belongsTo(User::class, 'mst_user_id');
    }

    public function getFkRefProdukWarnaAttribute()
    {
        $rp_obj = app('App\Repositories\Contracts\Ref\ProdukRepoInterface');
        $rp = $rp_obj->find($this->attributes['ref_produk_id']);
        if(count($rp)>0){
            return $rp->kode_warna;
        }  
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

    public function getNextSku($mst_cabang_id)
    {
        $cb_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
        $cb = $cb_obj->find($mst_cabang_id);
        if(count($cb)>0){

            // ambil record terakhir dari tabel di model ini
            $last_record = $this->where('mst_cabang_id', '=', $mst_cabang_id)
                                ->orderBy('id', 'DESC')
                                ->first();
            // jika ada record
            if(count($last_record)>0){
                $urut_akhir = str_replace($cb->kode_cabang, "", $last_record->sku);
                 $urut_akhir = $urut_akhir+1;
                if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 10000) $urut_akhir = '0'.$urut_akhir;
               
                // output berupa kode cabang+nomor urut terakhir dr SKU yg ada
                return $cb->kode_cabang.''.$urut_akhir;
            }else{
                // jika record tdk ditemukan, maka nomor urut akhir = 1
                $urut_akhir =  1;
                if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
                if($urut_akhir < 10000) $urut_akhir = '0'.$urut_akhir;
                // return nomor urut pertama 
                return $cb->kode_cabang.''.$urut_akhir;
            }

        }
        return null;
    }


    public function mst_history_stok()
    {
        return $this->hasMany(HistoryStok::class, 'mst_produk_id');
    }

    public function mst_penjualan()
    {
        return $this->hasMany(Penjualan::class, 'mst_produk_id');
    }

    
}
