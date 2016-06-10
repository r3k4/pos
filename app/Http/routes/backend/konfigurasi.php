<?php 

Route::get('konfigurasi', [
	'as'	=> 'backend_konfigurasi.index',
	'uses'	=> 'KonfigurasiController@index'
]);

Route::post('konfigurasi/update', [
	'as'	=> 'backend_konfigurasi.update',
	'uses'	=> 'KonfigurasiController@update'
]);
