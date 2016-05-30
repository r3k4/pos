<?php 

Route::group(['namespace' => 'Produk'], function(){

	Route::resource('ref_satuan_produk', 'SatuanProdukController', [
		'names'	=> [
				'index'	=> 'backend_ref_satuan_produk.index',
				'show'	=> 'backend_ref_satuan_produk.show',
				'create'	=> 'backend_ref_satuan_produk.create',
				'store'	=> 'backend_ref_satuan_produk.store',
				'edit'	=> 'backend_ref_satuan_produk.edit',
				'update'	=> 'backend_ref_satuan_produk.update',
				'destroy'	=> 'backend_ref_satuan_produk.destroy'
		]]);


});

