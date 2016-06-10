<?php 

Route::group(['namespace'	=> 'Produk'], function(){

	Route::get('produk',[
		'as'	=> 'backend_produk.index',
		'uses'	=> 'ProdukController@index'
	]);

	Route::get('produk/create',[
		'as'	=> 'backend_produk.create',
		'uses'	=> 'ProdukController@create'
	]);


	Route::post('produk/store',[
		'as'	=> 'backend_produk.store',
		'uses'	=> 'ProdukController@store'
	]);


	Route::get('produk/edit/{id}',[
		'as'	=> 'backend_produk.edit',
		'uses'	=> 'ProdukController@edit'
	]);

	Route::post('produk/update',[
		'as'	=> 'backend_produk.update',
		'uses'	=> 'ProdukController@update'
	]);	

	Route::get('produk/show/{id}',[
		'as'	=> 'backend_produk.show',
		'uses'	=> 'ProdukController@show'
	]);


	Route::post('produk/delete',[
		'as'	=> 'backend_produk.delete',
		'uses'	=> 'ProdukController@delete'
	]);

	Route::get('produk/stok_kosong',[
		'as'	=> 'backend_produk.stok_kosong.index',
		'uses'	=> 'ProdukController@stok_kosong'
	]);


	// kelola stok barang
	Route::get('produk/kelola_stok/{id}',[
		'as'	=> 'backend_produk.kelola_stok',
		'uses'	=> 'ProdukController@kelola_stok'
	]);


	Route::post('produk/update_stok_barang',[
		'as'	=> 'backend_produk.update_stok_barang',
		'uses'	=> 'ProdukController@update_stok_barang'
	]);


	Route::get('produk/cetak_barcode/{mst_produk_id}',[
		'as'	=> 'backend_produk.cetak_barcode',
		'uses'	=> 'ProdukController@cetak_barcode'
	]);



	Route::get('produk/import',[
		'as'	=> 'backend_produk.import',
		'uses'	=> 'ProdukController@import'
	]);

	Route::post('produk/do_import',[
		'as'	=> 'backend_produk.do_import',
		'uses'	=> 'ProdukController@do_import'
	]);

		


});