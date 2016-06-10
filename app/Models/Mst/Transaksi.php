<?php

namespace App\Models\Mst;

use App\Models\Mst\Cabang;
use App\Models\Mst\Penjualan;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'mst_transaksi';
    protected $fillable = [
    	'mst_user_id',
    	'mst_cabang_id',
    	'no_transaksi',
        'subtotal_pembayaran', // nominal yg harus dibayar dan sudah dikurangi potongan
        'nominal_kembalian',
        'bayar', //nominal yg dibayarkan (bln dikurangi jika ada kembalian)
        'diskon', //potongan harga
        'total_tanpa_potongan' //nominal tanpa potongan
    ];

    protected $appends = [
    	'fk__mst_user', 
    	'fk__mst_cabang',
        'fk__total_item'
    ];


    public function getFkTotalItemAttribute()
    {

        $pj_obj = app('App\Repositories\Contracts\Mst\PenjualanRepoInterface');
        $jml = 0;
        $q = $pj_obj->all(null, [['mst_transaksi_id', '=', $this->attributes['id']]]);
        foreach($q as $list){
            $jml = $jml+$list->qty;
        }
        return $jml;
    }

    public function getFkMstUserAttribute()
    {
        $u_obj = app('App\Repositories\Contracts\Mst\UserRepoInterface');
        $u = $u_obj->find($this->attributes['mst_user_id']);
        if(count($u)>0){
            return $u->nama;
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


    /**
     * set default value of no_transaksi column
     * @param string $value
     */
    public function setNoTransaksiAttribute($value)
    {
    	$mst_cabang_id = $this->attributes['mst_cabang_id'];
    	$no_transaksi =  $this->getNoTransaksi($mst_cabang_id);
        \Log::info('no transaksi : '.$no_transaksi);
    	return $this->attributes['no_transaksi'] = $no_transaksi;
    }



    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

    public function mst_cabang()
    {
    	return $this->belongsTo(Cabang::class, 'mst_cabang_id');
    }

    public function mst_penjualan()
    {
        return $this->hasMany(Penjualan::class, 'mst_transaksi_id');
    }



    /**
     * print output nomor transaksi berdasarkan cabang
     * format nomor transaksi : {kode_cabang}-{tgl:Ymd}-{no urut}
     * @param  integer $mst_cabang_id 
     * @return string                
     */
    private function getNoTransaksi($mst_cabang_id)
    {
    	$tgl_skrg = date('Ymd');
    	$cb_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
    	$c = $cb_obj->find($mst_cabang_id);
    	if(count($c)>0){
    		// jika record cabang ditemukan 
    		$kode_cabang = $c->kode_cabang;

    		// ambil data cabang, record terakhir
    		$q_trx = $this->where('mst_cabang_id', '=', $mst_cabang_id)
                          ->orderBy('id', 'DESC')
                          ->where('no_transaksi', 'like', $kode_cabang.'-'.$tgl_skrg.'-%')
                          ->first();
    		if(count($q_trx)>0){
    			// jika sudah ada record
    			$no_trx  = explode("-", $q_trx->no_transaksi);
                if(count($no_trx)>2){
                    // jika sudah ada record tp tidak dalam bentuk format yg sesuai
                    $urut_akhir = $no_trx[2] + 1;                    
                }else{
                    $urut_akhir = 1;
                }

		        if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
		        if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
		        if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;

		        // nomor transaksi final
		        $no_transaksi = $kode_cabang.'-'.$tgl_skrg.'-'.$urut_akhir;

    		}else{
    			// jika blm ada record
    			$urut_akhir = 1;
		        if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
		        if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
		        if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;

		        // nomor transaksi final
		        $no_transaksi = $kode_cabang.'-'.$tgl_skrg.'-'.$urut_akhir;
    		}

            return $no_transaksi;

    	}else{
    		return response(['error' => ['ID cabang tdk ditemukan']], 422);
    	}

    }


}
