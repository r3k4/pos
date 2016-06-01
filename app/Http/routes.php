<?php




require __DIR__.'/routes/frontend/auth.php'; 



Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function(){

	
	Route::get('/', [
		'uses'	=> 'HomeController@index',
		'as'	=> 'backend_home.index'
	]);

	require __DIR__.'/routes/backend/produk.php';
	require __DIR__.'/routes/backend/stok_produk.php';
	require __DIR__.'/routes/backend/pengeluaran.php';



	Route::group(['middleware' => 'admin'], function(){
		require __DIR__.'/routes/backend/cabang.php'; 
		require __DIR__.'/routes/backend/user.php'; 

		// data referensi
		require __DIR__.'/routes/backend/ref_produk.php'; 
		require __DIR__.'/routes/backend/ref_satuan_produk.php'; 
	});



});