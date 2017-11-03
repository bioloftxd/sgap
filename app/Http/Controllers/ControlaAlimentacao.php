<?php

namespace App\Http\Controllers;

use App\AlimentacaoAve;
use App\TipoRacao;
use Illuminate\Http\Request;

class ControlaAlimentacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists("usuario")) {
            $listaAlimentacao = AlimentacaoAve::all()->where("ativo", "!=", 0);
            return view("alimentacaoAve.index", ["listaAlimentacao" => $listaAlimentacao]);
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
        $listaTipoRacao = TipoRacao::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.create", ["listaTipoRacao" => $listaTipoRacao]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alimentacao = new AlimentacaoAve();
        $alimentacao->data = ($request->data) ? $request->data : date("Y-m-d");
        $alimentacao->hora = ($request->hora) ? $request->hora : date("H:i");
        $alimentacao->id_gaiola = ($request->id_gaiola) ? $request->id_gaiola : 0;
        $alimentacao->id_tipo_racao = ($request->id_tipo_racao) ? $request->id_tipo_racao : 0;
        $alimentacao->id_usuario = session()->get("usuario")->id;
        $alimentacao->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $alimentacao->quantidade_alimento = ($request->quantidade_alimento > 0) ? $request->quantidade_alimento : 1;

        if ($request->id_tipo_racao == null) {
            $listaTipoRacao = TipoRacao::all()->where("ativo", "!=", 0);
            session()->put("info", "Selecione o tipo de ração!");
            return view("alimentacaoAve.create", ["alimentacao" => $alimentacao, "listaTipoRacao" => $listaTipoRacao]);
        }
        $alimentacao->save();
        $listaAlimentacao = AlimentacaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("alimentacaoAve.index", ["listaAlimentacao" => $listaAlimentacao]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimentacao = AlimentacaoAve::find($id);
        return view("alimentacaoAve.show", ["alimentacao" => $alimentacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimentacao = AlimentacaoAve::find($id);
        $listaTipoRacao = TipoRacao::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.edit", ["alimentacao" => $alimentacao, "listaTipoRacao" => $listaTipoRacao]);
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
        $alimentacao = AlimentacaoAve::find($id);
        $alimentacao->data = ($request->data) ? $request->data : $alimentacao->data;
        $alimentacao->hora = ($request->hora) ? $request->hora : $alimentacao->hora;
        $alimentacao->id_gaiola = ($request->id_gaiola) ? $request->id_gaiola : $alimentacao->id_gaiola;
        $alimentacao->id_tipo_racao = ($request->id_tipo_racao) ? $request->id_tipo_racao : $alimentacao->id_tipo_racao;
        $alimentacao->id_usuario = session()->get("usuario")->id;
        $alimentacao->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $alimentacao->quantidade_alimento = ($request->quantidade_alimento > 0) ? $request->quantidade_alimento : $alimentacao->quantidade_alimento;

        if ($request->id_tipo_racao == null) {
            $listaTipoRacao = TipoRacao::all()->where("ativo", "!=", 0);
            session()->put("info", "Selecione o tipo de ração!");
            return view("alimentacaoAve.create", ["alimentacao" => $alimentacao, "listaTipoRacao" => $listaTipoRacao]);
        }
        $alimentacao->save();
        $listaAlimentacao = AlimentacaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("alimentacaoAve.index", ["listaAlimentacao" => $listaAlimentacao]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alimentacao = AlimentacaoAve::find($id);
        $alimentacao->ativo = 0;
        $alimentacao->save();
        session()->put("info", "Registro removido");
        $listaAlimentacao = AlimentacaoAve::all()->where("ativo", "!=", 0);
        return view("alimentacaoAve.index", ["listaAlimentacao" => $listaAlimentacao]);

    }
}
