<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use Illuminate\Http\Request;

class TransaksiSayaController extends Controller
{
	/**
	 * set lokasi base view
	 * @var string
	 */
    private $base_view = 'konten.backend.transaksi_saya.';

    /**
     * load repo transaksi
     * @var App\Repositories\Contracts\Mst\TransaksiRepoInterface
     */
    protected $transaksi;


    public function __construct(TransaksiRepoInterface $transaksi){
    	$this->transaksi = $transaksi;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_transaksi_saya', true);
    }


    /**
     * filter berdasarkan tanggal
     * @param  string $tgl 
     * @return array      
     */
    private function filter_tgl($tgl)
    {
    	$filter = [
    		'mst_cabang_id'	=> \Auth::user()->mst_cabang_id,
    		'mst_user_id'	=> \Auth::user()->id,
    		['created_at', 'like', $tgl.'%']
    	];
    	return $filter;
    }


    /**
     * memunculkan menu  - transaksi saya (level karyawan)
     * @return view
     */
    public function index(Request $request)
    {
    	$filter_tgl = $request->get('filterTgl');
    	if($filter_tgl){
    		$filter = $this->filter_tgl($filter_tgl);
    	}else{
    		$filter = $this->filter_tgl(date('Y-m-d'));
    	}
    	$transaksi = $this->transaksi->all(10, $filter);
    	$vars = compact('transaksi');
    	return view($this->base_view.'index', $vars);
    }




}
