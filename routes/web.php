<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::post('/cart', 'CartDetailController@store');

//grupo de rutas se implementa prefijo y dos middleware
Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
    //CR
    Route::get('/products', 'ProductController@index');//listado de productos
    Route::get('/products/create', 'ProductController@create');//formulario de registro
    Route::post('/products', 'ProductController@store');//crear

    //UD
    Route::get('/products/{id}/edit', 'ProductController@edit');//formulario de edicion
    Route::post('/products/{id}/update', 'ProductController@update');//actualizar

    Route::delete('/products/{id}', 'ProductController@destroy');// eliminar

    Route::get('/products/{id}/images', 'ImageController@index');// ver imagenes segun producto
    Route::post('/products/{id}/images', 'ImageController@store');// guardar imagenes segun producto
    Route::delete('/products/{id}/images', 'ImageController@destroy');// eliminar imagenes segun producto
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select');// destacar imagen

});