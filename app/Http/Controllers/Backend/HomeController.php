<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\PengeluaranRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $base_view = 'konten.backend.home.';
    protected $produk;
    protected $pengeluaran;

    public function __construct(ProdukRepoInterface $produk,
                                PengeluaranRepoInterface $pengeluaran 
    ){
        $this->pengeluaran = $pengeluaran;
        $this->produk = $produk;
    	view()->share('backend_home', true);
        view()->share('base_view', $this->base_view);
    }
    

    public function index()
    {
        if(\Auth::user()->ref_user_level_id == 1){
            return $this->level_admin();
        }
        return $this->level_karyawan();
	}


	public function level_admin()
	{
		return view($this->base_view.'index');
	}



    private function level_karyawan()
    {
        // jml produk berdasarkan cabang karyawan
        $filter = [['mst_cabang_id', '=', \Auth::user()->mst_cabang_id]];
        $jml_produk = $this->produk->count($filter);

        // produk stok kosong
        $jml_produk_stok_kosong = $this->produk->count(['stok_barang' => 0]);

        // jml nominal pengeluaran hr ini
        $jml_pengeluaran_hr_ini = $this->pengeluaran->getJmlPengeluaranHarian(date('Y-m-d'));

        $vars = compact('jml_produk', 'jml_produk_stok_kosong', 'jml_pengeluaran_hr_ini');
        return view($this->base_view.'karyawan.index', $vars);
    }

    
}
