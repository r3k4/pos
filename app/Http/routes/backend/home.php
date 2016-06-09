<?php 

Route::get('/', [
	'uses'	=> 'HomeController@index',
	'as'	=> 'backend_home.index'
]);

Route::get('pilih_cabang/{mst_cabang_id}', [
	'uses'	=> 'HomeController@pilih_cabang',
	'as'	=> 'backend_home.pilih_cabang'
]);



Route::group(['namespace' => 'Home'], function(){

	Route::post('home/check_produk_transaksi', [
		'uses'	=> 'TransaksiController@check_produk_transaksi',
		'as'	=> 'backend_home.check_produk_transaksi'
	]);

	Route::post('home/add_to_cart', [
		'uses'	=> 'TransaksiController@add_to_cart',
		'as'	=> 'backend_home.add_to_cart'
	]);
	
	Route::post('home/remove_item', [
		'uses'	=> 'TransaksiController@remove_item',
		'as'	=> 'backend_home.remove_item'
	]);

	Route::post('home/kosongkan_cart', [
		'uses'	=> 'TransaksiController@kosongkan_cart',
		'as'	=> 'backend_home.kosongkan_cart'
	]);
	
	Route::post('home/insert_penjualan', [
		'uses'	=> 'TransaksiController@insert_penjualan',
		'as'	=> 'backend_home.insert_penjualan'
	]);
	
	Route::get('home/show_list_pembelian', [
		'uses'	=> 'TransaksiController@show_list_pembelian',
		'as'	=> 'backend_home.show_list_pembelian'
	]);



	Route::get('home/search_produk', [
		'uses'	=> 'TransaksiController@search_produk',
		'as'	=> 'backend_home.search_produk'
	]);

	Route::post('home/submit_search_produk', [
		'uses'	=> 'TransaksiController@submit_search_produk',
		'as'	=> 'backend_home.submit_search_produk'
	]);

	Route::get('home/cetak_struk_pembelian/{id}', [
		'uses'	=> 'TransaksiController@cetak_struk_pembelian',
		'as'	=> 'backend_home.cetak_struk_pembelian'
	]);
	Route::get('home/show_single_transaksi/{id}', [
		'uses'	=> 'TransaksiController@show_single_transaksi',
		'as'	=> 'backend_home.show_single_transaksi'
	]);



});

