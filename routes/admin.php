<?php 

Route::group(['prefix'=> 'admin', 'namespace' => 'admin'], function(){
	Config::set('auth.defines', 'admin');
	Route::name('admin.login')->get('login', 'AdminAuth@login');
	Route::name('admin.login')->post('login' ,'AdminAuth@isLogin');
	Route::name('forgot_password')->get('forgot/password' ,'AdminAuth@forgot_password');
	Route::name('forgot_password')->post('forgot/password' ,'AdminAuth@forgot_password_post');
	Route::name('reset_password')->get('reset/password/{token}', 'AdminAuth@reset_password');
	Route::name('reset_password')->post('reset/password/{token}', 'AdminAuth@reset_password_post');
	Route::group(['middleware' => 'admin:admin'], function(){
		Route::get('/', function()
			{
				return view('admin.home');
			});	
		Route::name('admin.logout')->any('logout', 'AdminAuth@logout');
			

});	


});

