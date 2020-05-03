<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index');//listado de productos

//CR
Route::get('/admin/products/create', 'ProductController@create');//formulario de registro
Route::post('/admin/products', 'ProductController@store');//crear
