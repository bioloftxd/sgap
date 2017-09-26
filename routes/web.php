<?php

Route::get('/', "ControlaUsuario@index");

Route::resource("usuario", "ControlaUsuario");

Route::post("usuario/autenticar", "ControlaUsuario@autenticar");

/*Route::get("/cadastrarUsuario", "ControlaUsuarios@paginaCrud");

Route::post("/cadastrarUsuario", "ControlaUsuarios@cadastrar");*/
