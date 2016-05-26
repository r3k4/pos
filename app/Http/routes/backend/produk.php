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

	Route::post('produk/show/{id}',[
		'as'	=> 'backend_produk.show',
		'uses'	=> 'ProdukController@show'
	]);


	Route::post('produk/delete',[
		'as'	=> 'backend_produk.delete',
		'uses'	=> 'ProdukController@delete'
	]);


});