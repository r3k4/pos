<?php

namespace App\Jobs\Transaksi;

use App\Jobs\Job;

class insertTransaksiPenjualanJob extends Job
{

    public $mst_cabang_id;
    public $bayar; 
    public $kembalian;
    public $diskon;

    public function __construct($mst_cabang_id, $bayar, $kembalian, $diskon)
    {
        $this->diskon = $diskon;
        $this->bayar = $bayar;
        $this->kembalian = $kembalian;
        $this->mst_cabang_id = $mst_cabang_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // insert transaksi
        $insert_transaksi = $this->insert_transaksi();
        $pj = app('App\Repositories\Contracts\Mst\PenjualanRepoInterface');

        // insert data ke dalam detail pembelian
        foreach(\Cart::content() as $list){
            $data_penjualan = [
                'mst_produk_id'             => $list->id,
                'harga_produk'              => $list->price,
                'uang_diterima'             => $list->price, //harga satuan produk
                'qty'                       => $list->qty,
                'subtotal_uang_diterima'    => $list->subtotal, //harga satuan * jml pembelian
                'mst_user_id'               => \Auth::user()->id,
                'mst_cabang_id'             => $this->mst_cabang_id,
                'mst_transaksi_id'          => $insert_transaksi->id,
                'harga_beli_produk'         => '0',
            ];
            $insert_penjualan = $pj->create($data_penjualan);
            $this->update_stok($insert_transaksi->no_transaksi, $list->id, $list->qty);
        }

        // hapus data item transaksi
        \Cart::destroy();


         return $insert_transaksi->id;
    }

    private function update_stok($no_transaksi, $mst_produk_id, $jml_pembelian)
    {
        $stok_obj = app('App\Repositories\Contracts\Mst\HistoryStokRepoInterface');
        $produk_obj = app('App\Repositories\Contracts\Mst\ProdukRepoInterface');
        
        // get stok awal 
        $produk = $produk_obj->find($mst_produk_id);
        $stok_awal = $produk->stok_barang;

        //mengurangi jml stok dengan transaksi berdasarkan jumlah item yg dibeli
        $stok_sekarang = $stok_awal - $jml_pembelian;

        // set variable
        $keterangan = 'transaksi penjualan, no_transaksi : '.$no_transaksi;
        $mst_user_id = \Auth::user()->id;
        $jml_stok = $stok_sekarang;

        $update = $stok_obj->updateStok($mst_produk_id, $jml_stok, $mst_user_id, $keterangan);        
    }


    private function insert_transaksi()
    {
        $subtotal_pembayaran = \Cart::total() - $this->diskon;
        
        $transaksi = app('App\Repositories\Contracts\Mst\TransaksiRepoInterface');
        // insert data ke dlm tabel transaksi
        $data_transaksi = [
            'mst_user_id' => \Auth::user()->id, 
            'mst_cabang_id' => $this->mst_cabang_id,
            'no_transaksi'  => '0',
            'subtotal_pembayaran'   => $subtotal_pembayaran,
            'bayar'                 => $this->bayar,
            'nominal_kembalian'     => $this->kembalian,
            'diskon'                => $this->diskon,
            'total_tanpa_potongan'  => \Cart::total(),
        ];
        $insert_transaksi = $transaksi->create($data_transaksi);
        return $insert_transaksi;      
    }


}

