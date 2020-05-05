<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//grupo de rutas se implementa prefijo y dos middleware
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    //CR
    Route::get('/products', 'ProductController@index');//listado de productos
    Route::get('/products/create', 'ProductController@create');//formulario de registro
    Route::post('/products', 'ProductController@store');//crear

    //UD
    Route::get('/products/{id}/edit', 'ProductController@edit');//formulario de edicion
    Route::post('/products/{id}/update', 'ProductController@update');//actualizar

    Route::delete('/products/{id}', 'ProductController@destroy');// eliminar
});

