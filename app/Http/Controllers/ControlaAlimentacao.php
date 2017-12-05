<?php

namespace App\Http\Controllers;

use App\AlimentacaoAve;
use App\Estoque;
use App\Produto;
use App\Usuario;
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
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc("data");
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
        return view("alimentacaoAve.create", ["listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
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
        $dados->tipo_racao = ($request->tipo_racao) ? $request->tipo_racao : "-";
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->id_racao = ($request->id_racao) ? $request->id_racao : null;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->quantidade_alimento = ($request->quantidade_alimento > 0) ? $request->quantidade_alimento : 1;
        if ($request->tipo_racao == null) {
            session()->put("info", "Selecione o tipo de ração!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.create", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }
        if ($request->id_racao == null) {
            session()->put("info", "Selecione a ração!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.create", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }
        $racao = Estoque::where("id_produto", "=", $dados->id_racao)->first();
        $racao->quantidade -= $dados->quantidade_alimento;
        DB::beginTransaction();
        try {
            $dados->save();
            $racao->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.create", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc("data");
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
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
        return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
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
        $dados->tipo_racao = ($request->tipo_racao) ? $request->tipo_racao : $dados->tipo_racao;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->id_racao = ($request->id_racao) ? $request->id_racao : null;
        if ($request->tipo_racao == null) {
            session()->put("info", "Selecione o tipo de ração!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }
        if ($request->id_racao == null) {
            session()->put("info", "Selecione a ração!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }
        $racao = Estoque::where("id_produto", "=", $dados->id_racao)->first();

        if ($request->quantidade_alimento < $dados->quantidade_alimento) {
            $racao->quantidade += $dados->quantidade_alimento - $request->quantidade_alimento;
            $dados->quantidade_alimento = $request->quantidade_alimento;
        } else {
            $racao->quantidade -= $request->quantidade_alimento - $dados->quantidade_alimento;
            $dados->quantidade_alimento = $request->quantidade_alimento;
        }

        DB::beginTransaction();
        try {
            $dados->save();
            $racao->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaRacoes = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "==", "Ração");
            return view("alimentacaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaRacoes" => $listaRacoes]);
        }

        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc("data");
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
        $racao = Estoque::where("id_produto", "=", $dados->id_racao)->first();
        $racao->quantidade += $dados->quantidade_alimento;
        DB::beginTransaction();
        try {
            $dados->save();
            $racao->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->erroInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc("data");
        return view("alimentacaoAve.index", ["listaDados" => $listaDados]);

    }
}
