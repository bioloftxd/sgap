<?php

Route::get('/', "ControlaUsuario@index");
Route::get('loggout', 'ControlaAutenticacao@loggout');

Route::resource('autentica', 'ControlaAutenticacao');
Route::resource('alimentacaoAve', 'ControlaAlimentacao');
Route::resource('aquisicaoAve', 'ControlaAquisicao');
Route::resource('coletaExcremento', 'ControlaColetaExcremento');
Route::resource('coletaOvo', 'ControlaColetaovo');
Route::resource('embalaOvo', 'ControlaEmbalaOvo');
Route::resource('estoque', 'ControlaEstoque');
Route::resource('fornecedor', 'ControlaFornecedor');
Route::resource('fornecimento', 'ControlaFornecimento');
Route::resource('funcao', 'Controlafuncao');
Route::resource('gaiola', 'ControlaGaiola');
Route::resource('manutencaoAviario', 'ControlaManutencaoAviario');
Route::resource('morteAve', 'ControlaMorteAve');
Route::resource('produto', 'ControlaProduto');
Route::resource('tipoEmbalagem', 'ControlaTipoEmbalagem');
Route::resource('tipoRacao', 'ControlaTipoRacao');
Route::resource('usuario', 'ControlaUsuario');
Route::resource('vendaOvo', 'ControlaVendaOvo');
Route::resource('ventilacao', 'ControlaVentilacao');

?>