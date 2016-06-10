<?php

namespace App\Jobs\Transaksi;

use App\Jobs\Job;

class exportTransaksiJob extends Job
{

    public $mst_cabang_id;
    public $thn;
    public $bln;


    public function __construct($mst_cabang_id, $thn, $bln)
    {
        $this->mst_cabang_id = $mst_cabang_id;
        $this->thn = $thn;
        $this->bln = $bln;
    }


   private function konten_header($sheet)
    { 
        $c_obj = app('App\Repositories\Contracts\Mst\CabangRepoInterface');
        $bulan = fungsi()->bulan2($this->bln);
        $cabang = $c_obj->find($this->mst_cabang_id);
        //judul
        $sheet->row(1, array(
             'Data transaksi bulan '.$bulan.' - tahun '.$this->thn.' - Cabang '.$cabang->nama
        ));
        $sheet->mergeCells('A1:G1');
        $sheet->cells('A1:G1', function($cells) {
            $cells->setFontSize(40);
        });     
        $sheet->setHeight(1, 50);   

        //header kolom
        $sheet->row(2, [
                'No.', 'No Transaksi', 'Qty', 'Total Harga', 'Tgl', 'Jam', 'Operator'
            ]);
        $sheet->setHeight(2, 30);  
        $sheet->setFreeze('A3');
 

        //pewarnaan
        $sheet->cells('A2:G2', function($cells) {
            $cells->setBackground('#009DB3');
            $cells->setFontColor('#D0D0D0');
            $cells->setFontSize(16);
            // Set all borders (top, right, bottom, left)
            $cells->setBorder('solid', 'solid', 'solid', 'solid');


            // manipulate the range of cells

        });        

    }


    
    

    private function konten_utama($sheet)
    {
        $t_obj = app('App\Repositories\Contracts\Mst\TransaksiRepoInterface');
        $no_start = 3;
        $no_konten = 1;
        $q = $t_obj->getTransaksiBulanan($this->mst_cabang_id, $this->bln, $this->thn);
        foreach($q as $list){
             $array_konten = [
                $no_konten, $list->no_transaksi, $list->fk__total_item,
                $list->subtotal_pembayaran, fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))),
                date('H:i', strtotime($list->created_at)), $list->fk__mst_user
             ];
  
            $sheet->row($no_start, $array_konten);         
            $sheet->setHeight($no_start, 30);   
            $no_konten++;
            $no_start++;
        }
    }


    private function set_attribute($excel)
    {
        // Set the title
        $excel->setTitle('data transaksi ');

        // Chain the setters
        $excel->setCreator('data transaksi')
              ->setCompany('data transaksi');

        // Call them separately
        $excel->setDescription('data transaksi');        
    }



    public function handle()
    {
        \Excel::create('DataTransaksi', function($excel) {
            $this->set_attribute($excel);

            $excel->sheet('Sheet1', function($sheet) {

                $this->konten_header($sheet);
                $this->konten_utama($sheet);

            });



        })->download('xls');   

    }



}
