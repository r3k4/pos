<?php 

Route::group(['namespace'	=> 'Produk'], function(){


	Route::resource('detail_produk', 'DetailProdukController', [
		'names'	=> [
				'index'	=> 'backend_detail_produk.index',
				'show'	=> 'backend_detail_produk.show',
				'create'	=> 'backend_detail_produk.create',
				'store'	=> 'backend_detail_produk.store',
				'edit'	=> 'backend_detail_produk.edit',
				'update'	=> 'backend_detail_produk.update',
				'destroy'	=> 'backend_detail_produk.destroy'
		]]);



});