<?php

namespace App\Http\Controllers\Backend\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Ref\ProdukRepoInterface as refProdukRepoInterface;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
	private $base_view = 'konten.backend.produk.';
	protected $produk;
	protected $ref_produk;

    public function __construct(ProdukRepoInterface $produk, 
    							refProdukRepoInterface $ref_produk
					    	){
    	$this->ref_produk = $ref_produk;
    	$this->produk = $produk;
    	view()->share('backend_produk', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	return view($this->base_view.'index');
    }

    public function create()
    {
    	$ref_produk = $this->ref_produk->getAllDropdown('jenis produk');
    	$vars = compact('ref_produk');
    	return view($this->base_view.'create.index', $vars);
    }

}
