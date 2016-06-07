<?php 

Route::get('log', [
	'as'	=> 'backend_log.index',
	'uses'	=> 'LogController@index'	
]);

Route::post('log/clear_log', [
	'as'	=> 'backend_log.clear_log',
	'uses'	=> 'LogController@clear_log'	
]);