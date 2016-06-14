<?php 

Route::get('statistik_transaksi', [
	'as'	=> 'backend_statistik_transaksi.index',
	'uses'	=> 'StatistikTransaksiController@index'
]);


Route::get('statistik_transaksi/statistik_tahunan', [
	'as'	=> 'backend_statistik_transaksi.statistik_tahunan',
	'uses'	=> 'StatistikTransaksiController@statistik_tahunan'
]);