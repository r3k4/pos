<?php 

Route::group(['namespace'	=> 'Produk'], function(){

	Route::get('detail_produk',[
		'as'	=> 'backend_detail_produk.index',
		'uses'	=> 'DetailProdukController@index'
	]);

 


});