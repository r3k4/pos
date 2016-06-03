<?php 

Route::get('/', [
	'uses'	=> 'HomeController@index',
	'as'	=> 'backend_home.index'
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


});

