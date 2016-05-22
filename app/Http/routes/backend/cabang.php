<?php 

Route::group(['namespace'	=> 'Cabang'], function(){

	Route::get('cabang',[
		'as'	=> 'backend_cabang.index',
		'uses'	=> 'CabangController@index'
	]);

	Route::get('cabang/create',[
		'as'	=> 'backend_cabang.create',
		'uses'	=> 'CabangController@create'
	]);

	Route::post('cabang/store',[
		'as'	=> 'backend_cabang.store',
		'uses'	=> 'CabangController@store'
	]);

	Route::get('cabang/show/{id}',[
		'as'	=> 'backend_cabang.show',
		'uses'	=> 'CabangController@show'
	]);
 
});