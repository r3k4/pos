<?php

namespace App\Http\Controllers\Backend\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Produk\createOrUpdateProdukRequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Ref\ProdukRepoInterface as refProdukRepoInterface;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
	private $base_view = 'konten.backend.produk.';
	protected $produk;
	protected $ref_produk;
    protected $mst_cabang;

    public function __construct(ProdukRepoInterface $produk, 
    							refProdukRepoInterface $ref_produk,
                                CabangRepoInterface $mst_cabang
					    	){
        $this->mst_cabang = $mst_cabang;
    	$this->ref_produk = $ref_produk;
    	$this->produk = $produk;
    	view()->share('backend_produk', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
        $produk = $this->produk->all(10);
        $backend_produk_home = true;
        $vars = compact('produk', 'backend_produk_home');
    	return view($this->base_view.'index', $vars);
    }

    public function create()
    {
    	$ref_produk = $this->ref_produk->getAllDropdown('jenis produk');
        $mst_cabang = $this->mst_cabang->getAllDropdown('cabang');
    	$vars = compact('ref_produk', 'mst_cabang');
    	return view($this->base_view.'popup.create', $vars);
    }

    public function store(createOrUpdateProdukRequest $request)
    {
        return $this->produk->create($request->except('_token'));
    }


    public function edit($id)
    {
        $ref_produk = $this->ref_produk->getAllDropdown('jenis produk');
        $mst_cabang = $this->mst_cabang->getAllDropdown('cabang');
        $produk = $this->produk->find($id);
        $vars = compact('produk', 'ref_produk', 'mst_cabang');
        return view($this->base_view.'popup.edit', $vars);
    }

    public function update(createOrUpdateProdukRequest $request)
    {
        return $this->produk->update($request->id, $request->except(['_token', 'id']));
    }

    public function delete(Request $request)
    {
        return $this->produk->delete($request->id);
    }


    public function show($id)
    {
        $produk = $this->produk->find($id);
        $vars = compact('produk');
        return view($this->base_view.'popup.show', $vars);
    }



}
