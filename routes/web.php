<?php
Route::get('/', "ControlaUsuario@index");

Route::group(['prefix' => 'usuario'], function () {
    Route::resource('/', 'ControlaUsuario');
});

Route::group(['prefix' => 'autentica'], function () {
    Route::resource('/', 'ControlaAutenticacao');
    Route::get('loggout', 'ControlaAutenticacao@loggout');
});