<?php

use Illuminate\Database\Seeder;
use App\Models\Ref\SatuanProduk;

class SatuanProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$check = SatuanProduk::find(1);
		if(count($check)<=0){
			$data = [
				'id'	=> 1,
				'nama'	=> 'pcs'
			];
			SatuanProduk::create($data);
		}



		$check = SatuanProduk::find(2);
		if(count($check)<=0){
			$data = [
				'id'	=> 2,
				'nama'	=> 'kg'
			];
			SatuanProduk::create($data);
		}


		$check = SatuanProduk::find(3);
		if(count($check)<=0){
			$data = [
				'id'	=> 3,
				'nama'	=> 'gram'
			];
			SatuanProduk::create($data);
		}

		$check = SatuanProduk::find(4);
		if(count($check)<=0){
			$data = [
				'id'	=> 4,
				'nama'	=> 'liter'
			];
			SatuanProduk::create($data);
		}




    }
}
