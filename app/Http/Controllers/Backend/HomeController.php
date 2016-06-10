<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $base_view = 'konten.backend.home.';
    protected $produk;
    protected $pengeluaran;
    protected $transaksi;
    protected $penjualan;

    public function __construct(ProdukRepoInterface $produk,
                                PengeluaranRepoInterface $pengeluaran,
                                TransaksiRepoInterface $transaksi,
                                PenjualanRepoInterface $penjualan
                                ){
        $this->penjualan = $penjualan;
        $this->transaksi = $transaksi;
        $this->pengeluaran = $pengeluaran;
        $this->produk = $produk;
    	view()->share('backend_home', true);
        view()->share('base_view', $this->base_view);
    }
    
    /**
     * halaman awal yg ada pada homepage
     * @return view
     */
    public function index()
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return $this->level_admin();
        }
        return $this->level_karyawan();
	}


    public function pilih_cabang($mst_cabang_id)
    {
        if($mst_cabang_id == 0){
            \Session::forget('mst_cabang_id');
        }else{
            \Session::put('mst_cabang_id', $mst_cabang_id);
        }
        return redirect()->back();
    }


    /**
     * halaman untuk level admin
     * @return view
     */
	private function level_admin()
	{
        
        $tgl_skrg = date('Y-m-d');

        if(\Session::has('mst_cabang_id')){
            $filter_jml_produk = ['mst_cabang_id' => \Session::get('mst_cabang_id')];
            $filter_stok_kosong = [
                'stok_barang' => 0, 'mst_cabang_id' => \Session::get('mst_cabang_id')
            ];
            $mst_cabang_id = \Session::get('mst_cabang_id');
            $filter_transaksi = [
                ['mst_cabang_id', '=', $mst_cabang_id],
                ['created_at', 'like', date('Y-m-d').'%']
            ];


        }else{
            $filter_jml_produk = [];
            $filter_transaksi = [
                ['created_at', 'like', date('Y-m-d').'%']
            ];            
            $filter_stok_kosong = ['stok_barang' => 0];
            $mst_cabang_id = null;
        }
        $jml_produk = $this->produk->count($filter_jml_produk);
        $jml_produk_stok_kosong = $this->produk->count($filter_stok_kosong);
        $jml_all_stok_produk = $this->produk->getTotalJmlStok($mst_cabang_id);
        $jml_item_terjual_today = $this->penjualan->countJmlItemTerjual($tgl_skrg, $mst_cabang_id);
        $jml_transaksi_today = $this->transaksi->count($filter_transaksi);
        $jml_pengeluaran_hr_ini = $this->pengeluaran->getJmlPengeluaranHarian($tgl_skrg, $mst_cabang_id);
        $vars = compact('jml_produk', 'jml_produk_stok_kosong', 
                        'jml_pengeluaran_hr_ini', 'jml_all_stok_produk',
                        'jml_transaksi_today', 'jml_item_terjual_today'
                    );
        return view($this->base_view.'admin.index', $vars);
	}


    /**
     * halaman untuk level karyawan
     * @return [type] [description]
     */
    private function level_karyawan()
    {
        $filter = [['mst_cabang_id', '=', \Auth::user()->mst_cabang_id]];
        $jml_produk = $this->produk->count($filter);
        $jml_produk_stok_kosong = $this->produk->count(['stok_barang' => 0]);
        $jml_pengeluaran_hr_ini = $this->pengeluaran->getJmlPengeluaranHarian(date('Y-m-d'));
        $vars = compact('jml_produk', 'jml_produk_stok_kosong', 'jml_pengeluaran_hr_ini');
        return view($this->base_view.'karyawan.index', $vars);
    }


    
}
