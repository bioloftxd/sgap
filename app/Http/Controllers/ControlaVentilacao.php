<?php

namespace App\Http\Controllers;

use App\Ventilacao;
use Illuminate\Http\Request;

class ControlaVentilacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists("usuario")) {
            $listaVentilacao = Ventilacao::all()->where("ativo", "!=", 0);
            return view("ventilacao.index", ["listaVentilacao" => $listaVentilacao]);
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
        return view("ventilacao.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventilacao = new Ventilacao();

        $ventilacao->data_abertura = ($request->data_abertura) ? $request->data_abertura : date("Y-m-d");
        $ventilacao->hora_abertura = ($request->hora_abertura) ? $request->hora_abertura : date("H:i");
        $ventilacao->data_fechamento = ($request->data_fechamento) ? $request->data_fechamento : date("Y-m-d");
        $ventilacao->hora_fechamento = ($request->hora_fechamento) ? $request->hora_fechamento : date("H:i");
        $ventilacao->temperatura_maxima = ($request->temperatura_maxima) ? $request->temperatura_maxima : null;
        $ventilacao->temperatura_minima = ($request->temperatura_minima) ? $request->temperatura_minima : null;
        $ventilacao->id_usuario = session()->get("usuario")->id;
        $ventilacao->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Oservações!";

        if ($request->temperatura_maxima == null) {
            session()->put("info", "Insira a temperatura máxima!");
            return view("ventilacao.create", ["ventilacao" => $ventilacao]);
        }

        if ($request->temperatura_minima == null) {
            session()->put("info", "Insira a temperatura mínima!");
            return view("ventilacao.create", ["ventilacao" => $ventilacao]);
        }

        $ventilacao->save();
        $listaVenlicao = Ventilacao::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("ventilacao.index", ["listaVentilacao" => $listaVenlicao]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventilacao = Ventilacao::find($id);
        return view("ventilacao.show", ["ventilacao" => $ventilacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventilacao = Ventilacao::find($id);

        return view("ventilacao.edit", ["ventilacao" => $ventilacao]);
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
        $ventilacao = Ventilacao::find($id);
        $ventilacao->data_abertura = ($request->data_abertura) ? $request->data_abertura : $ventilacao->data_abertura;
        $ventilacao->hora_abertura = ($request->hora_abertura) ? $request->hora_abertura : $ventilacao->hora_abertura;
        $ventilacao->data_fechamento = ($request->data_fechamento) ? $request->data_fechamento : $ventilacao->data_fechamento;
        $ventilacao->hora_fechamento = ($request->hora_fechamento) ? $request->hora_fechamento : $ventilacao->hora_fechamento;
        $ventilacao->temperatura_maxima = ($request->temperatura_maxima) ? $request->temperatura_maxima : $ventilacao->temperatura_maxima;
        $ventilacao->temperatura_minima = ($request->temperatura_minima) ? $request->temperatura_minima : $ventilacao->temperatura_minima;
        $ventilacao->id_usuario = session()->get("usuario")->id;
        $ventilacao->observacoes = ($request->observacoes) ? $request->observacoes : $ventilacao->observacoes;
        $ventilacao->save();

        $listaVentilacao = Ventilacao::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("ventilacao.index", ["listaVentilacao" => $listaVentilacao]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventilacao = Ventilacao::find($id);
        $ventilacao->ativo = 0;
        $ventilacao->save();
        session()->put("info", "Registro removido!");
        $listaVentilacao = Ventilacao::all()->where("ativo", "!=", 0);
        return view("ventilacao.index", ["listaVentilacao" => $listaVentilacao]);

    }
}
