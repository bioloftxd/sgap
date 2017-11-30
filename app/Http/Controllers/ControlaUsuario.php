<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    public function store(Request $request)
    {
        $listaUsuarios = Usuario::all();
        $dados = new Usuario;
        $dados->nome = $request->nome;
        $dados->senha = md5($request->senha);
        $dados->usuario = strtolower($request->usuario);

        if ($request->senha != $request->senhaConfirma) {
            session()->put("info", "As senhas não coincidem!");
            return view("usuario.create", ["dados" => $dados]);
        }
        if ($request->senha == null || $request->senhaConfirma == null) {
            session()->put("info", "Campo de senha obrigatório!");
            return view("usuario.create", ["dados" => $dados]);
        }
        if (sizeof($listaUsuarios) == 0) {
            $funcao = Funcao::find(1);
            $dados->funcao()->associate($funcao);
        } else {
            $funcao = Funcao::find(2);
            $dados->funcao()->associate($funcao);
        }
        foreach ($listaUsuarios as $usuarioCadastrado) {
            if ($usuarioCadastrado->usuario == $dados->usuario) {
                session()->put("info", "Nome de usuário já utilizado!");
                return back();
            }
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("usuario.create", ["dados" => $dados]);
        }
        session()->put("info", "Registro salvo!");
        return redirect()->action("ControlaUsuario@index");
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
        $listaUsuarios = Usuario::all();

        if ($request->novaSenha != null) {

            if ($request->senha == null) {
                session()->put("info", "Necessário inserção da senha atual!");
                return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
            } else {

                if (md5($request->senha) == $usuario->senha) {

                    if ($request->novaSenha != $request->novaSenhaConfirma) {
                        session()->put("info", "As novas senhas não coincidem!");
                        return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
                    } else {
                        $usuario->senha = md5($request->novaSenha);
                    }

                } else {
                    session()->put("info", "Senha atual incorreta!");
                    return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
                }
            }

        }

        foreach ($listaUsuarios as $usuarioCadastrado) {
            if ($usuarioCadastrado->usuario == $request->usuario && $usuarioCadastrado->usuario != $usuario->usuario) {
                session()->put("info", "Nome de usuário já utilizado!");
                return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
            }
        }
        $usuario->nome = $request->nome;
        $usuario->usuario = $request->usuario;
        $usuario->save();

        session()->put("usuario", $usuario);
        session()->put("info", "Registro alterado!");
        return redirect()->action("ControlaUsuario@edit", ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Usuario::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->flush();
            session()->put("info", "Conta desativada!");
            return redirect()->action("ControlaUsuario@index");
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e);
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao desativar! ($erro)");
            return view("usuario.edit", ['usuario' => $dados]);
        }
    }

}
