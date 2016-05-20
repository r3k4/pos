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

});