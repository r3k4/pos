<?php

namespace App\Http\Controllers\Backend\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\HistoryStok\createStokRequest;
use App\Http\Requests\Produk\createOrUpdateProdukRequest;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\HistoryStokRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Ref\ProdukRepoInterface as refProdukRepoInterface;
use App\Repositories\Contracts\Ref\SatuanProdukRepoInterface;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
	private $base_view = 'konten.backend.produk.';
	protected $produk;
	protected $ref_produk;
    protected $mst_cabang;
    protected $stok;
    protected $satuan_barang;

    public function __construct(ProdukRepoInterface $produk, 
    							refProdukRepoInterface $ref_produk,
                                CabangRepoInterface $mst_cabang,
                                HistoryStokRepoInterface $stok,
                                SatuanProdukRepoInterface $satuan_barang
					    	){
        $this->satuan_barang = $satuan_barang;
        $this->stok       = $stok;
        $this->mst_cabang = $mst_cabang;
    	$this->ref_produk = $ref_produk;
    	$this->produk = $produk;
    	view()->share('backend_produk', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index(Request $request)
    {
        $search = $request->get('search');
        if($search){
            $filter  = [['nama', 'like', '%'.$search.'%']];
        }else{
            $filter = [];
        }

        $produk = $this->produk->all(10, $filter);
        $backend_produk_home = true;
        $vars = compact('produk', 'backend_produk_home');
    	return view($this->base_view.'index', $vars);
    }

    public function create()
    {
        $satuan_barang = $this->satuan_barang->getAllDropdown('satuan barang');
    	$ref_produk = $this->ref_produk->getAllDropdown('jenis produk');
        $mst_cabang = $this->mst_cabang->getAllDropdown('cabang');
    	$vars = compact('ref_produk', 'mst_cabang', 'satuan_barang');
    	return view($this->base_view.'popup.create', $vars);
    }

    public function store(createOrUpdateProdukRequest $request)
    {
        return $this->produk->create($request->except('_token'));
    }


    public function edit($id)
    {
        $satuan_barang = $this->satuan_barang->getAllDropdown('satuan barang');
        $ref_produk = $this->ref_produk->getAllDropdown('jenis produk');
        $mst_cabang = $this->mst_cabang->getAllDropdown('cabang');
        $produk = $this->produk->find($id);
        $vars = compact('produk', 'ref_produk', 'mst_cabang', 'satuan_barang');
        return view($this->base_view.'popup.edit', $vars);
    }

    public function update(createOrUpdateProdukRequest $request)
    {
        $produk = $this->produk->find($request->id);
        // check authorisasi saat update produk
        $this->authorize('updateProduk', $produk);


        return $this->produk->update($request->id, $request->except(['_token', 'id']));
    }

    public function delete(Request $request)
    {
        // check authorisasi saat destroy produk
        $this->authorize('destroyProduk', $produk);        
        return $this->produk->delete($request->id);
    }


    public function show($id)
    {
        $produk = $this->produk->find($id);
        $vars = compact('produk');
        return view($this->base_view.'popup.show', $vars);
    }


    public function stok_kosong()
    {
        $filter = ['stok_barang' => '0'];
        $produk = $this->produk->all(10, $filter);
        $produk_stok_kosong = true;
        $vars = compact('produk', 'produk_stok_kosong');
        return view($this->base_view.'stok_kosong.index', $vars);
    }

    public function kelola_stok($id)
    {
        $keterangan = ['tambah stok' => 'tambah stok', 
                       'pengurangan stok' => 'pengurangan stok',
                       'stok awal'  => 'stok awal'
                       ];
        $produk = $this->produk->find($id);
        $vars = compact('produk', 'keterangan');
        return view($this->base_view.'popup.kelola_stok', $vars);
    }


    public function update_stok_barang(createStokRequest $request)
    {
        $mst_produk_id = $request->mst_produk_id;
        $jml_stok = $request->stok_barang;
        $mst_user_id = \Auth::user()->id;
        $keterangan = $request->keterangan;
        return $this->stok->updateStok($mst_produk_id, $jml_stok, $mst_user_id, $keterangan);
    }


    public function cetak_barcode($mst_produk_id, Request $request)
    {
        $jml = $request->get('jml');
        $produk = $this->produk->find($mst_produk_id);
        $vars = compact('produk', 'jml');
        if(!$jml){
           return view($this->base_view.'popup.cetak_barcode', $vars);
        }   
        $data = ['produk' => $produk, 'jml' => $jml];
        $pdf = \PDF::loadView($this->base_view.'cetak_barcode.index', $data);
        return $pdf->stream('barcode.pdf');
    }



}
