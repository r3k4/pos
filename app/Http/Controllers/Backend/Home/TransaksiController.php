<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\Transaksi\insertTransaksiPenjualanJob;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
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
    	// check stok barang 
    	$produk = $this->produk->find($request->id);
    	$stok = $produk->stok_barang;

    	// check jml stok yg ada di konten cart
    	$filter = ['id' => $request->id];
    	$check_cart_konten = \Cart::search($filter);
    	if($check_cart_konten != false){
    		// jika sudah ada, maka lanjut check
    		$get_cart_konten = \Cart::get($check_cart_konten[0]);
    		$stok_br = $stok - $get_cart_konten->qty;
    		if($stok_br == 0){
    			return response(['error' => ['stok item '.$produk->nama.' telah habis']], 422);
    		}
    	}

        // insert ke dlm keranjang belanja
        $insert_cart = \Cart::add($request->id, 
        						  $request->nama, 
        						  $request->jml, 
        						  $request->harga, 
        						  [
        						  	'sku' => $request->sku
        						  ]);
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
        $bayar = $request->bayar;
        $kembalian = $request->kembalian;
        $job = new insertTransaksiPenjualanJob($mst_cabang_id, $bayar, $kembalian);
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
        $transaksi = $this->transaksi->find($id);
        $cabang = $this->cabang->find($transaksi->mst_cabang_id);
        $data = ['transaksi' => $transaksi, 'cabang' => $cabang];
        $pdf = \PDF::loadView($this->base_view.'karyawan.cetak_struk_pembelian.index', $data);

       // lihat ukuran kertas pada link berikut : 
       // https://en.wikipedia.org/wiki/Paper_size#/media/File:A_size_illustration2.svg
        $pdf->setPaper('a7', 'landscape');
        return $pdf->stream('struk_pembelian.pdf');        
    }

    public function show_single_transaksi($id)
    {
        $transaksi = $this->transaksi->find($id);
        $cabang = $this->cabang->find($transaksi->mst_cabang_id);        
        $vars = compact('transaksi', 'cabang');
        return view($this->base_view.'karyawan.popup.show_single_transaksi', $vars);
    }


}
