<?php

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/anasayfa', 'HomeController@index');

Route::group(['middleware' => ['admin_mi','auth']], function()
{
	Route::group(['namespace' => 'Admin'], function()
	{
		Route::get('/site-ayarlari','AyarController@index');
		Route::put('/site-ayarlari/guncelle','AyarController@guncelle');
		Route::resource('user','UserController');
	});
});

