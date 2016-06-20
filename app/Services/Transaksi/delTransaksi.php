<?php 

namespace App\Services\Transaksi;

use App\Repositories\Contracts\Mst\HistoryStokRepoInterface;
use App\Repositories\Contracts\Mst\PenjualanRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use Illuminate\Http\Request;

class delTransaksi
{

	protected $request;
	protected $transaksi;
	protected $penjualan;
	protected $history_stok;

	public function __construct(Request $request,
								TransaksiRepoInterface $transaksi,
								PenjualanRepoInterface $penjualan,
								HistoryStokRepoInterface $history_stok
					){
		$this->history_stok = $history_stok;
		$this->penjualan = $penjualan;
		$this->transaksi = $transaksi;
		$this->request = $request;
	}

	/**
	 * handle delete produk action
	 * @return string
	 */
	public function handle()
	{
		$this->restoreStokProduk()
			 ->delPenjualan()
			 ->doDeleteTransaksi();
		return 'ok';
	}


	/**
	 *  kembalikan stok semula ke produk
	 * @return void
	 */
	private function restoreStokProduk()
	{
		$trx = $this->transaksi->find($this->request->id);
		foreach($trx->mst_penjualan as $list){
			$produk = $list->mst_produk;
			if(count($produk)>0){
				$this->history_stok->updateStok($list->mst_produk_id, 
												$jml_stok = $produk->stok_barang+$list->qty, 
												$trx->mst_user_id, 
												$keterangan = 'pembatalan transaksi/hapus record'
										);						
			}
		}
		return $this;
	}

	/**
	 * hapus record penjualan dari transaksi
	 * @return void
	 */
	private function delPenjualan()
	{
		$trx = $this->transaksi->find($this->request->id);
		foreach($trx->mst_penjualan as $list){
			$this->penjualan->delete($list->id);
		}
		return $this;
	}

	private function doDeleteTransaksi()
	{
		$this->transaksi->delete($this->request->id);
		return $this;
	}

}