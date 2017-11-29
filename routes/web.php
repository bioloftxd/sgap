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

    Route::get('relatorioAlimentacao', 'ControlaRelatorios@relatorioAlimentacao');
    Route::get('relatorioAquisicao', 'ControlaRelatorios@relatorioAquisicao');
    Route::get('relatorioColetaExcremento', 'ControlaRelatorios@relatorioColetaExcremento');
    Route::get('relatorioColetaOvo', 'ControlaRelatorios@relatorioColetaOvo');
    Route::get('relatorioEmbalaOvo', 'ControlaRelatorios@relatorioEmbalaOvo');
    Route::get('relatorioEstoque', 'ControlaRelatorios@relatorioEstoque');
    Route::get('relatorioFornecedor', 'ControlaRelatorios@relatorioFornecedor');
    Route::get('relatorioFornecimento', 'ControlaRelatorios@relatorioFornecimento');
    Route::get('relatorioGaiola', 'ControlaRelatorios@relatorioGaiola');
    Route::get('relatorioManutencao', 'ControlaRelatorios@relatorioManutencao');
    Route::get('relatorioMortalidade', 'ControlaRelatorios@relatorioMortalidade');
    Route::get('relatorioProduto', 'ControlaRelatorios@relatorioProduto');
    Route::get('relatorioVendaOvo', 'ControlaRelatorios@relatorioVendaOvo');
    Route::get('relatorioVentilacao', 'ControlaRelatorios@relatorioVentilacao');

    Route::post('relatorioAlimentacao', 'ControlaRelatorios@relatorioAlimentacao');
    Route::post('relatorioAquisicao', 'ControlaRelatorios@relatorioAquisicao');
    Route::post('relatorioColetaExcremento', 'ControlaRelatorios@relatorioColetaExcremento');
    Route::post('relatorioColetaOvo', 'ControlaRelatorios@relatorioColetaOvo');
    Route::post('relatorioEmbalaOvo', 'ControlaRelatorios@relatorioEmbalaOvo');
    Route::post('relatorioEstoque', 'ControlaRelatorios@relatorioEstoque');
    Route::post('relatorioFornecedor', 'ControlaRelatorios@relatorioFornecedor');
    Route::post('relatorioFornecimento', 'ControlaRelatorios@relatorioFornecimento');
    Route::post('relatorioGaiola', 'ControlaRelatorios@relatorioGaiola');
    Route::post('relatorioManutencao', 'ControlaRelatorios@relatorioManutencao');
    Route::post('relatorioMortalidade', 'ControlaRelatorios@relatorioMortalidade');
    Route::post('relatorioProduto', 'ControlaRelatorios@relatorioProduto');
    Route::post('relatorioVendaOvo', 'ControlaRelatorios@relatorioVendaOvo');
    Route::post('relatorioVentilacao', 'ControlaRelatorios@relatorioVentilacao');
});
?>