<?php 

Route::group(['namespace' => 'Produk'], function(){

	Route::get('stok_produk/{mst_produk_id}',[
		'uses'	=> 'StokProdukController@index',
		'as'	=> 'backend.stok_produk.index'
	]);


});