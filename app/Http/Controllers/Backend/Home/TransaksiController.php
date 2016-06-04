<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\Transaksi\insertTransaksiPenjualanJob;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
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

    /**
     * load repo penjualan
     * @var App\Repositories\Contracts\Mst\PenjualanRepoInterface
     */
    protected $penjualan;

    /**
     * load repo transaksi
     * @var App\Repositories\Contracts\Mst\TransaksiRepoInterface
     */
    protected $transaksi;



	public function __construct(ProdukRepoInterface $produk,
                                PenjualanRepoInterface $penjualan,
                                TransaksiRepoInterface $transaksi
                            ){
        $this->transaksi = $transaksi;
        $this->penjualan = $penjualan;
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
        return $produk;
        // return view($this->base_view.'karyawan.result', $vars);
    }

    /**
     * menambahkan item pada cart
     * @param Request $request  
     */
    public function add_to_cart(Request $request)
    {
        // insert ke dlm keranjang belanja
        $insert_cart = \Cart::add($request->id, $request->nama, $request->jml, $request->harga);
        return view($this->base_view.'karyawan.list_pembelian');
    }

    /**
     * menghapus item di dalam cart berdasarkan rowId
     * @param  Request $request  
     * @return  view
     */
    public function remove_item(Request $request)
    {
    	\Cart::remove($request->rowid);
    	return $this->show_list_pembelian();
    }

    /**
     * mengosongkan isi cart
     * @return [type] [description]
     */
    public function kosongkan_cart()
    {
        \Cart::destroy();
        return $this->show_list_pembelian();
    }



    /**
     * insert data penjualan ke dalam database
     * @param  Request $request 
     * @return [type]           
     */
    public function insert_penjualan(Request $request)
    {
        $mst_cabang_id = $request->mst_cabang_id;
        $this->dispatch(new insertTransaksiPenjualanJob($mst_cabang_id));     
        return $this->show_list_pembelian();   
    }



    /**
     * menampilkan view list pembelian
     * @return view
     */
    private function show_list_pembelian()
    {
       return view($this->base_view.'karyawan.list_pembelian');  
    }


}
