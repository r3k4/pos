<?php 
Route::group(['middleware' => 'karyawan'], function(){

	Route::get('transaksi_saya',[
		'as'	=> 'backend_transaksi_saya.index',
		'uses'	=> 'TransaksiSayaController@index'
	]);


});
