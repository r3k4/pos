<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RefProduk\createOrUpdateRefProdukRequest;
use App\Repositories\Contracts\Ref\ProdukRepoInterface as RefProdukRepoInterface;
use Illuminate\Http\Request;

class RefProdukController extends Controller
{


    private $base_view = 'konten.backend.ref_produk.';
    private $base_view_produk = 'konten.backend.produk.';

    protected $ref_produk;

    public function __construct(RefProdukRepoInterface $ref_produk)
    {
        $this->ref_produk = $ref_produk;
        view()->share('backend_ref_produk', true);
        view()->share('base_view', $this->base_view);

        view()->share('base_view_produk', $this->base_view_produk);
        view()->share('backend_produk', true);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ref_produk = $this->ref_produk->all(10);
        $vars = compact('ref_produk');
        return view($this->base_view.'index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->base_view.'popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createOrUpdateRefProdukRequest $request)
    {
        return $this->ref_produk->create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ref_produk = $this->ref_produk->find($id);
        $vars = compact('ref_produk');
        return view($this->base_view.'popup.show', $vars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ref_produk = $this->ref_produk->find($id);
        $vars = compact('ref_produk');
        return view($this->base_view.'popup.edit', $vars);
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
        return $this->ref_produk->update($id, $request->except('_token'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->ref_produk->delete($id);
    }
}
