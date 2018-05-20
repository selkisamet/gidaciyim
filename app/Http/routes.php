<?php

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/anasayfa', 'HomeController@index');

