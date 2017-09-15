<?php

Route::get('/', function () {
    return view('autentica');
});

Route::post("/autenticar", "Autenticacao@autentica");

Route::get("/cadastrar", "ControlaUsuarios@paginaCrud");

Route::post("/cadastrarUsuario", "ControlaUsuarios@cadastrar");
