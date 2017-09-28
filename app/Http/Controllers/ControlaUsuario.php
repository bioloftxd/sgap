<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Session;
use App\Usuario;
use App\Funcao;

class ControlaUsuario extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("usuario/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $dados) {
        $usuario = new Usuario(
                [
            "nome" => $dados->get("nome"),
            "senha" => md5($dados->get("senha")),
            "usuario" => strtolower($dados->get("usuario"))
        ]);

        try {
            $usuario->save();
            Session::put("info", "Cadastro efetuado com sucesso!");
            return redirect()->action("ControlaUsuario@index");
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == "1062") {
                Session::put("info", "Nome de usuário já utilizado!");
                return view("usuario/create");
            } else {
                Session::put("info", "Erro ao cadastrar usuário, tente novamente!");
                return view("usuario/create");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function autenticar(Request $dados) {
        $autentica = new Usuario([
            "usuario" => strtolower($dados["usuario"]),
            "senha" => md5($dados["senha"])
        ]);

        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            if ($autentica["usuario"] == $usuario["usuario"]) {
                if ($usuario["senha"] == $usuario["senha"]) {
                    session()->forget("info");
                    Session::put("login", $usuario);
                    return redirect()->action("ControlaUsuario@index");
                } else {
                    session()->forget("info");
                    Session::put("info", "Senha incorreta!");
                    return redirect()->action("ControlaUsuario@index");
                }
            } else {
                session()->forget("info");
                Session::put("info", "Nome de usuário incorreto!");
            }
        }
    }

}
