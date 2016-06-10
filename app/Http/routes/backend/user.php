<?php 

Route::get('user', [
	'as'	=> 'backend_user.index',
	'uses'	=> 'UserController@index'
]);

Route::get('user/create', [
	'as'	=> 'backend_user.create',
	'uses'	=> 'UserController@create'
]);

Route::post('user/store', [
	'as'	=> 'backend_user.store',
	'uses'	=> 'UserController@store'
]);

Route::get('user/edit/{id}', [
	'as'	=> 'backend_user.edit',
	'uses'	=> 'UserController@edit'
]);


Route::post('user/update/{mst_user_id}', [
	'as'	=> 'backend_user.update',
	'uses'	=> 'UserController@update'
]);
 
 
Route::post('user/delete', [
	'as'	=> 'backend_user.delete',
	'uses'	=> 'UserController@delete'
]);


Route::post('user/reset_password', [
	'as'	=> 'backend_user.reset_password',
	'uses'	=> 'UserController@reset_password'
]);



