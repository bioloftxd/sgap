<?php
//->middleware("logado") Verifica autenticação, redireciona para login;

Route::get('/', "ControlaUsuario@index");

Route::resource("usuario", "ControlaUsuario")->middleware("logado");

/*Route::get("/cadastrarUsuario", "ControlaUsuarios@paginaCrud");

Route::post("/cadastrarUsuario", "ControlaUsuarios@cadastrar");*/
