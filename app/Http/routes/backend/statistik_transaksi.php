<?php 

Route::get('statistik_transaksi', [
	'as'	=> 'backend_statistik_transaksi.index',
	'uses'	=> 'StatistikTransaksiController@index'
]);