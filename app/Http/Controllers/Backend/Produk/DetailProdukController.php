<?php

namespace App\Http\Controllers\Backend\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\DetailProduk\createOrUpdateDetailProdukRequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\DetailProdukRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{


    private $base_view = 'konten.backend.detail_produk.';
    private $base_view_produk = 'konten.backend.produk.';

    protected $detail_produk;
    protected $mst_produk;
    protected $mst_cabang;

    public function __construct(DetailProdukRepoInterface $detail_produk, 
                                ProdukRepoInterface $mst_produk,
                                CabangRepoInterface $mst_cabang
                                ){
        $this->mst_cabang = $mst_cabang;
        $this->mst_produk = $mst_produk;
        $this->detail_produk = $detail_produk;
        view()->share('base_view', $this->base_view);
        view()->share('base_view_produk', $this->base_view_produk);
        view()->share('backend_produk', true);
        view()->share('backend_detail_produk_home', true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_produk = $this->detail_produk->all(10);
        $vars = compact('detail_produk');
        return view($this->base_view.'index', $vars);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mst_produk = $this->mst_produk->getAllDropdown('produk');
        $mst_cabang = $this->mst_cabang->getAllDropdown('cabang');
        $vars = compact('mst_produk', 'mst_cabang');
        return view($this->base_view.'create.index', $vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createOrUpdateDetailProdukRequest $request)
    {
        return $this->detail_produk->create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
