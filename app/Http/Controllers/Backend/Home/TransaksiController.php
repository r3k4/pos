<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
	/**
	 * lokasi folder view dalam controller ini
	 * @var string
	 */
	private $base_view = 'konten.backend.home.';

	/**
	 * load repo produk
	 * @var App\Repositories\Contracts\Mst\ProdukRepoInterface
	 */
	protected $produk;

	public function __construct(ProdukRepoInterface $produk)
	{
		$this->produk = $produk;
		view()->share('base_view', $this->base_view);
	}



    /**
     * ambil data produk untuk keperluan transaksi, saat scan barcode
     * @return view
     */
    public function check_produk_transaksi(Request $request)
    {
        // cek produk berdasarkan SKU
        $produk = $this->produk->findBy(['sku' => $request->kode_barang]);

        // cek produk berdasarkan barcode
        if(count($produk)<=0){
            $produk = $this->produk->findBy(['barcode'  => $request->kode_barang]);
        }

        // jika tetap tidak ditemukan
        if(count($produk)<=0){
            return response(['error' => ['data tdk ditemukan']], 422);
        }
        $vars = compact('produk');
        return view($this->base_view.'karyawan.result', $vars);
    }


    public function add_to_cart(Request $request)
    {
        // insert ke dlm keranjang belanja
        \Cart::add($request->id, $request->nama, $request->jml, $request->harga_jual);
        return view($this->base_view.'karyawan.list_pembelian');
    }


    public function remove_item(Request $request)
    {
    	\Cart::remove($request->rowid);
    	return view($this->base_view.'karyawan.list_pembelian'); 
    }



}
