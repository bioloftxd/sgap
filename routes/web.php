<?php
Route::get('/', "ControlaUsuario@index");

Route::group(['prefix' => 'usuario'], function () {
    Route::resource('/', 'ControlaUsuario');
});


Route::group(['prefix' => 'alimentacaoAve', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaAlimentacao');
});

Route::group(['prefix' => 'aquisicaoAve', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaAquisicao');
});

Route::group(['prefix' => 'coletaExcremento', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaColetaExcremento');
});

Route::group(['prefix' => 'coletaOvo', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaColetaovo');
});

Route::group(['prefix' => 'embalaOvo', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaEmbalaOvo');
});

Route::group(['prefix' => 'estoque', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaEstoque');
});

Route::group(['prefix' => 'fornecedor', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaFornecedor');
});

Route::group(['prefix' => 'fornecimento', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaFornecimento');
});

Route::group(['prefix' => 'funcao', 'middleware' => 'logado'], function () {
    Route::resource('/', 'Controlafuncao');
});

Route::group(['prefix' => 'gaiola', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaGaiola');
});

Route::group(['prefix' => 'manutencaoAviario', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaManutencaoAviario');
});

Route::group(['prefix' => 'morteAve', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaMorteAve');
});

Route::group(['prefix' => 'produto', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaProduto');
});

Route::group(['prefix' => 'tipoEmbalagem', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaTipoEmbalagem');
});

Route::group(['prefix' => 'tipoRacao', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaTipoRacao');
});

Route::group(['prefix' => 'autentica', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaAutenticacao');
    Route::get('loggout', 'ControlaAutenticacao@loggout');
});

Route::group(['prefix' => 'vendaOvo', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaVendaOvo');
});

Route::group(['prefix' => 'ventilacao', 'middleware' => 'logado'], function () {
    Route::resource('/', 'ControlaVentilacao');
});
