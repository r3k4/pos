<?php 

Route::get('transaki_karyawan', [
	'as'	=> 'backend_transaksi_karyawan.index',
	'uses'	=> 'TransaksiKaryawanController@index'
]);

Route::get('transaki_karyawan/filter_export', [
	'as'	=> 'backend_transaksi_karyawan.filter_export',
	'uses'	=> 'TransaksiKaryawanController@filter_export'
]);

Route::get('transaki_karyawan/do_export', [
	'as'	=> 'backend_transaksi_karyawan.do_export',
	'uses'	=> 'TransaksiKaryawanController@do_export'
]);


Route::post('transaki_karyawan/delete', [
	'as'	=> 'backend_transaksi_karyawan.delete',
	'uses'	=> 'TransaksiKaryawanController@delete'
]);

