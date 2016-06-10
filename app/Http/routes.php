<?php

require __DIR__.'/routes/frontend/auth.php'; 

Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function(){


	require __DIR__.'/routes/backend/home.php';

	require __DIR__.'/routes/backend/profile.php';


	Route::group(['middleware' => 'karyawan'], function(){

		require __DIR__.'/routes/backend/transaksi_saya.php';

	});
 
	Route::group(['middleware' => 'admin'], function(){

		require __DIR__.'/routes/backend/statistik_transaksi.php';
		require __DIR__.'/routes/backend/transaksi_karyawan.php';

		require __DIR__.'/routes/backend/stok_produk.php';
		require __DIR__.'/routes/backend/produk.php';
		require __DIR__.'/routes/backend/pengeluaran.php';
		require __DIR__.'/routes/backend/cabang.php'; 
		require __DIR__.'/routes/backend/user.php'; 
		require __DIR__.'/routes/backend/konfigurasi.php'; 
		require __DIR__.'/routes/backend/log.php'; 

		// data referensi
		require __DIR__.'/routes/backend/ref_produk.php'; 
		require __DIR__.'/routes/backend/ref_satuan_produk.php'; 
	});



});