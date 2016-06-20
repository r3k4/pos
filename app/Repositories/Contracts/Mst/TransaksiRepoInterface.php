<?php 

namespace App\Repositories\Contracts\Mst;

interface TransaksiRepoInterface 
{
	/**
	 * ambil jml transaksi per bulan
	 * @param  int $mst_cabang_id 
	 * @param  int $bln           
	 * @param  int $thn           
	 * @return Illuminate\Support\Collection
	 */
	public function getJmlTransaksiPerBln($mst_cabang_id = null, $bln, $thn);

	/**
	 * ambil jumlah nominal dari harga pokok, per bln
	 * @param  int $mst_cabang_id 
	 * @param  int $bln           
	 * @param  int $thn           
	 * @return int                
	 */
	public function getNominalTransaksiBulanan($mst_cabang_id = null, $bln, $thn);

	/**
	 * get list data transaksi bulanan
	 * @param  int $mst_cabang_id 
	 * @param  int $bln           
	 * @param  int $thn           
	 * @return Illuminate\Support\Collection
	 */
	public function getTransaksiBulanan($mst_cabang_id = null, $bln, $thn);


	/**
	 * get list data transaksi harian, dalam satu bulan
	 * @param  int $mst_cabang_id 
	 * @param  int $bln           
	 * @param  int $thn           
	 * @return Illuminate\Support\Collection       
	 */
	public function getNominalTransaksiHarian($mst_cabang_id = null, $bln, $thn);


	/**
	 * ambil nominal potongan dari transaksi bulanan
	 * @param  int $mst_cabang_id 
	 * @param  int $bln           
	 * @param  int $thn           
	 * @return int 
	 */
	public function getNominalPotonganBulanan($mst_cabang_id = null, $bln, $thn);	


	/**
	 * ambil nominal transaksi per tahun
	 * @param  int $mst_cabang_id 
	 * @param  int $thn           
	 * @return int                
	 */
	public function getNominalTransaksiTahunan($mst_cabang_id = null, $thn);


	public function delete($id);

}