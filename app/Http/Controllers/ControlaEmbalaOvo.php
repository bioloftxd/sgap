<?php

namespace App\Http\Controllers;

use App\ColetaOvo;
use App\EmbalaOvo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaEmbalaOvo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0);
        return view("embalaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("embalaOvo.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new EmbalaOvo();
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->lote = ($request->lote) ? $request->lote : null;
        $dados->tipo_embalagem = ($request->tipo_embalagem) ? $request->tipo_embalagem : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->quantidade_embalada = ($request->quantidade_embalada) ? $request->quantidade_embalada : null;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->lote == null) {
            session()->put("info", "Insira o lote da embalagem!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->tipo_embalagem == null) {
            session()->put("info", "Insira o tipo de embalagem!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->quantidade_embalada == null) {
            session()->put("info", "Insira o quantidade de embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("embalaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = EmbalaOvo::find($id);
        return view("embalaOvo.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = EmbalaOvo::find($id);
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("embalaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $dados = EmbalaOvo::find($id);
        $dados->data = ($request->data) ? $request->data : $dados->data;
        $dados->hora = ($request->hora) ? $request->hora : $dados->hora;
        $dados->lote = ($request->lote) ? $request->lote : $dados->lote;
        $dados->tipo_embalagem = ($request->tipo_embalagem) ? $request->tipo_embalagem : $dados->tipo_embalagem;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;
        $dados->quantidade_embalada = ($request->quantidade_embalada) ? $request->quantidade_embalada : $dados->quantidade_embalada;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->lote == null) {
            session()->put("info", "Insira o lote da embalagem!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->tipo_embalagem == null) {
            session()->put("info", "Insira o tipo de embalagem!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->quantidade_embalada == null) {
            session()->put("info", "Insira o quantidade de embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("embalaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("embalaOvo.edit", ["dados" => $dados]);
        }
        $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("embalaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = EmbalaOvo::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro Removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfor[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0);
        return view("embalaOvo.index", ["listaDados" => $listaDados]);
    }
}
