<?php 

Route::get('profile', [
	'uses'	=> 'ProfileController@index',
	'as'	=> 'backend_profile.index'
]);

Route::post('profile/update/{id}', [
	'uses'	=> 'ProfileController@update_profile',
	'as'	=> 'backend_profile.update_profile'
]);