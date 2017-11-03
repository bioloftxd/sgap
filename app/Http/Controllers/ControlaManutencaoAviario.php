<?php

namespace App\Http\Controllers;

use App\ManutencaoAviario;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaManutencaoAviario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        return view("manutencaoAviario.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("manutencaoAviario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new ManutencaoAviario();
        $dados->id_usuario_verifica = session()->get("usuario")->id;
        $dados->id_usuario_resolve = 0;
        $dados->data_verifica = ($request->data_verifica) ? $request->data_verifica : date("Y-m-d");
        $dados->hora_verifica = ($request->hora_verifica) ? $request->hora_verifica : date("H:i");
        $dados->data_resolve = "2001-09-11";
        $dados->hora_resolve = "00:00";
        $dados->numero_relatorio = ($request->numero_relatorio) ? $request->numero_relatorio : 0;
        $dados->ocorrencia = ($request->ocorrencia) ? $request->ocorrencia : "Sem Observações!";
        if ($request->ocorrencia == null) {
            session()->put("info", "Insira a ocorrência!");
            return view("manutencaoAviario.create", ["dados" => $dados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("manutencaoAviario.create", ["dados" => $dados]);
        }
        $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("manutencaoAviario.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = ManutencaoAviario::find($id);
        return view("manutencaoAviario.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = ManutencaoAviario::find($id);
        $usuarios = Usuario::all()->where("ativo", "!=", 0);
        return view("manutencaoAviario.edit", ["dados" => $dados, "usuarios" => $usuarios]);
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
        $dados = ManutencaoAviario::find($id);
        $usuarioVerifica = Usuario::find($request->id_usuario_verifica);
        $usuarioResolve = Usuario::find($request->id_usuario_resolve);
        if ($usuarioVerifica == null) {
            session()->put("info", "Usuário que identificador inexistente!");
            return back();
        }
        if ($usuarioResolve == null) {
            session()->put("info", "Usuário que resolutor inexistente!");
            return back();
        }
        $dados->data_verifica = ($request->data_verifica) ? $request->data_verifica : $dados->data_verifica;
        $dados->hora_verifica = ($request->hora_verifica) ? $request->hora_verifica : $dados->hora_verifica;
        $dados->data_resolve = ($request->data_resolve) ? $request->data_resolve : $dados->data_resolve;
        $dados->hora_resolve = ($request->hora_resolve) ? $request->hora_resolve : $dados->hora_resolve;
        $dados->numero_relatorio = ($request->numero_relatorio) ? $request->numero_relatorio : $dados->numero_relatorio;
        $dados->id_usuario_verifica = ($request->id_usuario_verifica) ? $request->id_usuario_verifica : $dados->id_usuario_verifica;
        $dados->id_usuario_resolve = ($request->id_usuario_resolve) ? $request->id_usuario_resolve : $dados->id_usuario_resolve;
        $dados->ocorrencia = ($request->ocorrencia) ? $request->ocorrencia : $dados->ocorrencia;
        $dados->resolucao = ($request->resolucao) ? $request->resolucao : $dados->resolucao;
        $dados->resolvido = ($request->resolvido == 0) ? 0 : 1;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("manutencaoAviario.create", ["dados" => $dados]);
        }
        $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("manutencaoAviario.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = ManutencaoAviario::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        return view("manutencaoAviario.index", ["listaDados" => $listaDados]);
    }

    public function storeResolve($id, Request $request)
    {
        $dados = ManutencaoAviario::find($id);
        $dados->data_resolve = ($request->data_resolve) ? $request->data_resolve : date("Y-m-d");
        $dados->hora_resolve = ($request->hora_resolve) ? $request->hora_resolve : date("H:i");
        $dados->resolucao = ($request->resolucao) ? $request->resolucao : "Sem Observações!";
        $dados->id_usuario_resolve = session()->get("usuario")->id;
        $dados->resolvido = 1;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("manutencaoAviario.resolver", ["dados" => $dados]);
        }
        $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("manutencaoAviario.index", ["listaDados" => $listaDados]);
    }

    public function resolver($id)
    {
        $dados = ManutencaoAviario::find($id);
        return view("manutencaoAviario.resolver", ["dados" => $dados]);
    }
}
