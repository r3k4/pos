<?php

namespace App\Jobs\Transaksi;

use App\Jobs\Job;

class cetakStrukPembelianJob extends Job
{

    public $mst_transaksi_id;
    public $base_view;

    public function __construct($mst_transaksi_id, $base_view)
    {
        $this->base_view = $base_view;
        $this->mst_transaksi_id = $mst_transaksi_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $t_obj = app('App\Repositories\Contracts\Mst\TransaksiRepoInterface');
        $c_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');

        $transaksi = $t_obj->find($this->mst_transaksi_id);
        $cabang = $c_obj->find($transaksi->mst_cabang_id);
        $data = ['transaksi' => $transaksi, 'cabang' => $cabang];
        $pdf = \PDF::loadView($this->base_view.'karyawan.cetak_struk_pembelian.index', $data);

       // lihat ukuran kertas pada link berikut : 
       // https://en.wikipedia.org/wiki/Paper_size#/media/File:A_size_illustration2.svg
        $pdf->setPaper('a7', 'landscape');
        return $pdf->stream('struk_pembelian.pdf');   
    }
}
