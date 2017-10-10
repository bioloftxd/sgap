<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Session;
use App\Usuario;
use App\Funcao;

class ControlaUsuario extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists("usuario")) {
            return view("inicio");
        } else {
            return view("autentica");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $dados)
    {
        $usuario = new Usuario;

        $usuario->nome = $dados->get("nome");
        $usuario->senha = md5($dados->get("senha"));
        $usuario->usuario = strtolower($dados->get("usuario"));

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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view("usuario/edit", ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if ($request->novaSenha != null) {

            if ($request->senha == null) {
                session()->put("info", "Necessário inserção da senha atual!");
                return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
            } else {
                if (md5($request->senha) == $usuario->senha) {
                    if ($request->novaSenha != $request->novaSenhaConfirma) {
                        session()->put("info", "As novas senhas não coincidem!");
                        $usuario->senha = $request->novaSenha;
                        return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
                    } else {
                        session()->put("info", "As novas senhas coincidem!");
                        return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
                    }
                } else {
                    session()->put("info", "Senha atual incorreta!");
                    return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
                }
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
