<?php 

Route::get('konfigurasi', [
	'as'	=> 'backend_konfigurasi.index',
	'uses'	=> 'KonfigurasiController@index'
]);