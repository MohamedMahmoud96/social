<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('/');


Route::pattern('id', '[0-9]+');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login/facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::resource('users', 'usersController');
Route::get('profile/show/{id}', 'usersController@show')->name('profile/show');
Route::post('user/image/{id}', 'usersController@change_image')->name('user/image');

/// post 
Route::name('post-create')->get('posts', 'PostsController@create');
Route::name('post-store')->post('post/store', 'PostsController@store');
Route::name('post-edit')->get('post/edit/{id}', 'PostsController@edit');
Route::name('post-update')->post('post/update/{id}', 'PostsController@update');
Route::name('post-delete')->delete('post/destroy/{id}', 'PostsController@destroy');
// like
Route::name('post-like')->delete('post/like', 'PostsController@disLike');
Route::name('post-like')->post('post/like', 'PostsController@like');


//follow
Route::name('follow')->post('follow', 'usersController@add_follow');
Route::name('follow')->delete('follow', 'usersController@delete_follow');
///setting
Route::name('setting')->get('setting', 'SettingController@index');


Route::name('comment/store')->post('comment/store', 'CommentsController@store');
Route::name('comment/delete')->post('comment/delete/{id}','CommentsController@comment_delete');

//replyy
Route::name('reply/store')->post('reply/store','CommentsController@reply_store');
Route::name('reply/delete')->post('reply/delete/{id}','CommentsController@reply_delete');




Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('login', 'AuthController@isLogin')->name('login');
//Route::post('registe', 'AuthController@')->name('register');