<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use Illuminate\Http\Request;

class StatistikTransaksiController extends Controller
{
    private $base_view = 'konten.backend.statistik_transaksi.';
    protected $transaksi;
    protected $cabang;
    protected $penjualan;
    protected $pengeluaran;

    public function __construct(TransaksiRepoInterface $transaksi, 
    							CabangRepoInterface $cabang,
    							PenjualanRepoInterface $penjualan,
                                PengeluaranRepoInterface $pengeluaran
    						){
        $this->pengeluaran = $pengeluaran;
    	$this->penjualan = $penjualan;
    	$this->cabang = $cabang;
    	$this->transaksi = $transaksi;
        view()->share('backend_statistik', true);
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_statistik_transaksi', true);
    }

    /**
     * menampilkan halaman statistik transaksi beserta filter by tahun+bulan
     * @param  Request $request 
     * @return view           
     */
    public function index(Request $request)
    {	
    	$cabang = $this->cabang->getAllDropdown('cabang');
        $cabang = array_add($cabang, 'all', 'semua cabang');
        $statistik_bulanan_home = true;

        // get data from request
    	$r_c = $request->get('mst_cabang_id');
    	$r_t = $request->get('thn');
        $r_b = $request->get('bln');


    	if($r_c != null && $r_b != null && $r_t != null){
            $transaksi_tunai = $this->transaksi->getJmlTransaksiPerThn($r_c, $r_t);

            $pengeluaran = $this->pengeluaran->getJmlPengeluaranBulanan($r_c, $r_b, $r_t);            
   			$transaksi = $this->transaksi->getJmlTransaksiPerBln($r_c, $r_b, $r_t);
            $nominal_transaksi = $this->transaksi->getNominalTransaksiBulanan($r_c, $r_b, $r_t);
            $nominal_potongan = $this->transaksi->getNominalPotonganBulanan($r_c, $r_b, $r_t);
   			$nominal_harga_beli = $this->penjualan->getNominalHargaJualBulanan($r_c, $r_b, $r_t);
    		$vars = compact(
                    'transaksi', 'cabang', 'nominal_transaksi', 
                    'nominal_harga_beli', 'transaksi_tunai',
                    'pengeluaran', 'nominal_potongan', 'statistik_bulanan_home'
                );
    	}else{
	    	$vars = compact('cabang', 'statistik_bulanan_home');    		
    	}

    	return view($this->base_view.'index', $vars);
    }



    /**
     * list transaksi tahunan (list all bulan dalam 1 thn)
     * @param  Request $request 
     * @return view        
     */
    public function statistik_tahunan(Request $request)
    {
        $cabang = $this->cabang->getAllDropdown('cabang');
        $cabang = array_add($cabang, 'all', 'semua cabang');
        $statistik_tahunan_home = true;

        // get data from request
        $r_c = $request->get('mst_cabang_id');
        $r_t = $request->get('thn');


        if($r_c != null && $r_t != null){
            $pengeluaran = $this->pengeluaran->getJmlPengeluaranTahunan($r_c, $r_t);
            $transaksi_tunai = $this->transaksi->getListNominalTransaksiBulanan($r_c, $r_t);
            $transaksi_object = $this->transaksi;

            $transaksi = $this->transaksi->getJmlTransaksiPerThn($r_c, $r_t);
            $nominal_transaksi = $this->transaksi->getNominalTransaksiTahunan($r_c, $r_t);
            // $nominal_potongan = $this->transaksi->getNominalPotonganBulanan($r_c, $r_b, $r_t);
            $nominal_harga_beli = $this->penjualan->getNominalHargaJualTahunan($r_c, $r_t);
            $vars = compact(
                    'transaksi', 'cabang', 'nominal_transaksi', 
                    'nominal_harga_beli', 'transaksi_tunai',
                    'pengeluaran', 'nominal_potongan', 'statistik_tahunan_home',
                    'transaksi_object'
                );
        }else{
            $vars = compact('cabang', 'statistik_tahunan_home');            
        }
        return view($this->base_view.'statistik_tahunan.index', $vars);
    }


}
