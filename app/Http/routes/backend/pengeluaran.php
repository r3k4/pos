<?php 

 

Route::resource('pengeluaran', 'PengeluaranController', [
	'names'	=> [
			'index'	=> 'backend_pengeluaran.index',
			'show'	=> 'backend_pengeluaran.show',
			'create'	=> 'backend_pengeluaran.create',
			'store'	=> 'backend_pengeluaran.store',
			'edit'	=> 'backend_pengeluaran.edit',
			'update'	=> 'backend_pengeluaran.update',
			'destroy'	=> 'backend_pengeluaran.destroy'
	]]);

