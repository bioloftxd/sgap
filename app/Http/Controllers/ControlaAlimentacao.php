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

        if ($request->id_tipo_racao == null) {
            session()->put("info", "Selecione o tipo de ração!");
            return view("alimentacaoAve.create", ["alimentacao" => $alimentacao]);
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
        return view("alimentacaoAve.edit", ["alimentacao" => $alimentacao]);
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
        //
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
