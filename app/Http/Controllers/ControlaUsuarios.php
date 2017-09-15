<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class ControlaUsuarios extends Controller {

    public function paginaCrud() {
        return view("usuarios/crudUsuario");
    }

    public function cadastrar() {
        $post = new Usuario();

        $post->nome = request("nome");
        $post->senha = request("senha");
        $post->nome_usuario = request("nomeUsuario");

        $post->save();

        return redirect("/");
    }

}
