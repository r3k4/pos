<?php

namespace App\Http\Controllers\Backend\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\HistoryStokRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use Illuminate\Http\Request;

class StokProdukController extends Controller
{
	
	private $base_view = 'konten.backend.produk.stok.';
    protected $produk;
    protected $stok;


    public function __construct(ProdukRepoInterface $produk, 
    							HistoryStokRepoInterface $stok
    							){
    	$this->stok = $stok;
    	$this->produk = $produk;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_produk', true);
    }


    public function index($mst_produk_id)
    {
    	$stok = $this->stok->all(10, ['mst_produk_id' => $mst_produk_id]);
    	$produk = $this->produk->find($mst_produk_id);
    	$vars = compact('produk', 'stok');
    	return view($this->base_view.'index', $vars);
    }

}
