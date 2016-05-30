<?php


Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
// Route::get('register', 'Auth\AuthController@showRegistrationForm');
// Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

 



Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function(){

	
	Route::get('/', [
		'uses'	=> 'HomeController@index',
		'as'	=> 'backend_home.index'
	]);

	require __DIR__.'/routes/backend/produk.php'; 
	require __DIR__.'/routes/backend/stok_produk.php'; 
	require __DIR__.'/routes/backend/cabang.php'; 

	// data referensi
	require __DIR__.'/routes/backend/ref_produk.php'; 
	require __DIR__.'/routes/backend/ref_satuan_produk.php'; 



});