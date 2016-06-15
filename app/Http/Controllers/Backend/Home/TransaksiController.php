<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\Transaksi\AddToCartJob;
use App\Jobs\Transaksi\cetakStrukPembelianJob;
use App\Jobs\Transaksi\insertTransaksiPenjualanJob;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use App\Services\Transaksi\addToCart;
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

    /**
     * load repo cabang
     * @var App\Repositories\Contracts\Mst\CabangRepoInterface
     */
    protected $cabang;


	public function __construct(ProdukRepoInterface $produk,
                                PenjualanRepoInterface $penjualan,
                                TransaksiRepoInterface $transaksi,
                                CabangRepoInterface $cabang
                            ){
        $this->cabang = $cabang;
        $this->transaksi = $transaksi;
        $this->penjualan = $penjualan;
		$this->produk = $produk;
		view()->share('base_view', $this->base_view);
	}


    public function search_produk()
    {
        return view($this->base_view.'karyawan.popup.search_produk');
    }


    public function submit_search_produk(Request $request)
    {
        $produk = $this->produk->all(null, [['nama', 'like', '%'.$request->nama_produk.'%']]);
        $vars = compact('produk');
        return view($this->base_view.'karyawan.popup.search_produk_result', $vars);
    }



    /**
     * ambil data produk untuk keperluan transaksi, saat scan barcode
     * @return view
     */
    public function check_produk_transaksi(Request $request)
    {
        $produk = $this->produk->findBy(['sku' => $request->kode_barang]);
        if(count($produk)<=0){
            $produk = $this->produk->findBy(['barcode'  => $request->kode_barang]);
        }
        if(count($produk)<=0){
            return response(['error' => ['data tdk ditemukan']], 422);
        }
        $vars = compact('produk');
        return $produk;
    }

    /**
     * menambahkan item pada cart
     * @param Request $request  
     */
    public function add_to_cart(addToCart $addToCart)
    {
        return $addToCart->handle($this->base_view);
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
        $job = new insertTransaksiPenjualanJob(
                $request->mst_cabang_id, $request->bayar, 
                $request->kembalian, $request->diskon
            );
        $insert_transaksi = $this->dispatch($job);     
        return $insert_transaksi;   
    }



    /**
     * menampilkan view list pembelian
     * @return view
     */
    public function show_list_pembelian()
    {
       return view($this->base_view.'karyawan.list_pembelian');  
    }


    public function cetak_struk_pembelian($id)
    {
        $job = new cetakStrukPembelianJob($id, $this->base_view);
        return $this->dispatch($job);
    }

    public function show_single_transaksi($id)
    {
        $transaksi = $this->transaksi->find($id);
        $cabang = $this->cabang->find($transaksi->mst_cabang_id);        
        $vars = compact('transaksi', 'cabang');
        return view($this->base_view.'karyawan.popup.show_single_transaksi', $vars);
    }


}
