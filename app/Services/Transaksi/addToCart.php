<?php 

namespace App\Services\Transaksi;

use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use Illuminate\Http\Request;

class addToCart
{

	protected $request;
	protected $produk;
	private $base_view = 'konten.backend.home.';

	public function __construct(Request $request, 
								ProdukRepoInterface $produk
							){
		$this->produk = $produk;
		$this->request = $request;
	}


	public function handle()
	{
        $produk = $this->produk->find($this->request->id);        
        $check = $this->check();
        if($check == 0){
            $errors = ['error' => ['stok item '.$produk->nama.' telah habis']];
            return response()->json($errors, 422);        
        }else{
            $trx = $this->insert()->view();
            return $trx;
        }		
	}	


    private function check()
    {
        $produk = $this->produk->find($this->request->id);
        $stok = $produk->stok_barang;

        // check jml stok yg ada di konten cart
        $filter = ['id' => $this->request->id];
        $check_cart_konten = \Cart::search($filter);
        if($check_cart_konten != false){
            // jika sudah ada, maka lanjut check
            $get_cart_konten = \Cart::get($check_cart_konten[0]);
            $stok_br = $stok - $get_cart_konten->qty;
            if($stok_br == 0){                
                return 0;
            }
        }
        return 1;
    }



    private function insert()
    {
        // insert ke dlm keranjang belanja
        $insert_cart = \Cart::add($this->request->id, 
                                  $this->request->nama, 
                                  $this->request->jml, 
                                  $this->request->harga, 
                                  [
                                    'sku' => $this->request->sku
                                  ]);
        return $this;        
    }

    private function view()
    {
        return view($this->base_view.'karyawan.list_pembelian');        
    }


}