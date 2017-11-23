<?php

Route::get('/', "ControlaUsuario@index");
Route::get('loggout', 'ControlaAutenticacao@loggout');
Route::resource('usuario', 'ControlaUsuario');
Route::resource('autentica', 'ControlaAutenticacao');

Route::group(['middleware' => ['logado']], function () {
    Route::resource('alimentacaoAve', 'ControlaAlimentacao');
    Route::resource('aquisicaoAve', 'ControlaAquisicao');
    Route::resource('coletaExcremento', 'ControlaColetaExcremento');
    Route::resource('coletaOvo', 'ControlaColetaOvo');
    Route::resource('embalaOvo', 'ControlaEmbalaOvo');
    Route::resource('estoque', 'ControlaEstoque');
    Route::resource('fornecedor', 'ControlaFornecedor');
    Route::resource('fornecimento', 'ControlaFornecimento');
    Route::resource('funcao', 'Controlafuncao');
    Route::resource('gaiola', 'ControlaGaiola');
    Route::resource('manutencaoAviario', 'ControlaManutencaoAviario');
    Route::post('manutencaoAviario/resolver{id}', 'ControlaManutencaoAviario@resolver');
    Route::post('manutencaoAviario/storeResolve{id}', 'ControlaManutencaoAviario@storeResolve');
    Route::resource('morteAve', 'ControlaMorteAve');
    Route::resource('produto', 'ControlaProduto');
    Route::resource('relatorios', 'ControlaRelatorios');
    Route::resource('tipoProduto', 'ControlaTipoProduto');
    Route::resource('vendaOvo', 'ControlaVendaOvo');
    Route::resource('ventilacao', 'ControlaVentilacao');
});
?>