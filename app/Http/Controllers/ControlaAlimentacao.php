<?php

namespace App\Http\Controllers;

use App\AlimentacaoAve;
use App\TipoRacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaAlimentacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = TipoRacao::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new AlimentacaoAve();
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->id_gaiola = ($request->id_gaiola) ? $request->id_gaiola : 0;
        $dados->id_tipo_racao = ($request->id_tipo_racao) ? $request->id_tipo_racao : 0;
        $dados->id_usuario = session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $dados->quantidade_alimento = ($request->quantidade_alimento > 0) ? $request->quantidade_alimento : 1;
        if ($request->id_tipo_racao == null) {
            $listaDados = TipoRacao::all()->where("ativo", "!=", 0);
            session()->put("info", "Selecione o tipo de ração!");
            return view("alimentacaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("alimentacaoAve.create", ["dados" => $dados]);
        }
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = AlimentacaoAve::find($id);
        return view("alimentacaoAve.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = AlimentacaoAve::find($id);
        $listaDados = TipoRacao::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $dados = AlimentacaoAve::find($id);
        $dados->data = ($request->data) ? $request->data : $dados->data;
        $dados->hora = ($request->hora) ? $request->hora : $dados->hora;
        $dados->id_gaiola = ($request->id_gaiola) ? $request->id_gaiola : $dados->id_gaiola;
        $dados->id_tipo_racao = ($request->id_tipo_racao) ? $request->id_tipo_racao : $dados->id_tipo_racao;
        $dados->id_usuario = session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $dados->quantidade_alimento = ($request->quantidade_alimento > 0) ? $request->quantidade_alimento : $dados->quantidade_alimento;
        $listaDados = TipoRacao::all()->where("ativo", "!=", 0);
        if ($request->id_tipo_racao == null) {
            session()->put("info", "Selecione o tipo de ração!");
            return view("alimentacaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = AlimentacaoAve::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->erroInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);

    }
}
