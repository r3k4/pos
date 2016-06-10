<?php 



Route::resource('ref_produk', 'RefProdukController', [
	'names'	=> [
			'index'	=> 'backend_ref_produk.index',
			'show'	=> 'backend_ref_produk.show',
			'create'	=> 'backend_ref_produk.create',
			'store'	=> 'backend_ref_produk.store',
			'edit'	=> 'backend_ref_produk.edit',
			'update'	=> 'backend_ref_produk.update',
			'destroy'	=> 'backend_ref_produk.destroy'
	]]);
