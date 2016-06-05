<?php 

	Route::get('transaksi_saya',[
		'as'	=> 'backend_transaksi_saya.index',
		'uses'	=> 'TransaksiSayaController@index'
	]);



