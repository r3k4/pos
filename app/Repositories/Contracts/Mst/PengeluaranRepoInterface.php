<?php 

namespace App\Repositories\Contracts\Mst;

interface PengeluaranRepoInterface 
{
 
	public function getJmlPengeluaranBulanan($mst_cabang_id = null, $bln, $thn);

	/**
	 * ambil record berdasarkan bulan, untuk keperluan filter
	 * @param  int $perPage 
	 * @param  int $tgl     
	 * @param  int $thn     
	 * @return void          
	 */
	public function getByBln($perPage = null, $bln, $thn);


	/**
	 * ambil record berdasarkan tanggal, untuk keperluan filter
	 * @param  int $perPage 
	 * @param  date/string $tgl     
	 * @return void          
	 */
	public function getByTgl($perPage = null, $tgl);

	/**
	 * get jumlah nominal pengeluaran harian
	 * @param  date/string $tgl 
	 * @return int      
	 */
	public function getJmlPengeluaranHarian($tgl);

	/**
	 * get nominal jumlah pengeluaran per tahun
	 * @param  int $mst_cabang_id 
	 * @param  int $thn           
	 * @return int                
	 */
	public function getJmlPengeluaranTahunan($mst_cabang_id = null, $thn);

}