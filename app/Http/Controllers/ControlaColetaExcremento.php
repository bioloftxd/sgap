<?php

namespace App\Http\Controllers;

use App\ColetaExcremento;
use App\Usuario;
use Illuminate\Http\Request;

class ControlaColetaExcremento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists("usuario")) {
            $listaColetas = ColetaExcremento::all()->where("ativo", "!=", 0);
            return view("coletaExcremento.index", ["listaColetas" => $listaColetas]);
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
        return view("coletaExcremento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coleta = new ColetaExcremento();

        $coleta->id_usuario = session()->get("usuario")->id;
        $coleta->data = ($request->data) ? $request->data : date("Y-m-d");
        $coleta->hora = ($request->hora) ? $request->hora : date("H:i");
        $coleta->litros = ($request->litros) ? $request->litros : 1;
        $coleta->observacoes = ($request->observacoes) ? $request->observacoes : "Sem observações!";
        $coleta->save();
        $listaColetas = ColetaExcremento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("coletaExcremento.index", ["listaColetas" => $listaColetas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coleta = ColetaExcremento::find($id);
        return view("coletaExcremento.show", ["coleta" => $coleta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coleta = ColetaExcremento::find($id);
        return view("coletaExcremento.edit", ["coleta" => $coleta]);
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
        $coleta = ColetaExcremento::find($id);
        $coleta->id_usuario = session()->get("usuario")->id;
        $coleta->data = ($request->data) ? $request->data : date("Y-m-d");
        $coleta->hora = ($request->hora) ? $request->hora : date("H:i");
        $coleta->litros = ($request->litros) ? $request->litros : 1;
        $coleta->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $coleta->save();
        $listaColetas = ColetaExcremento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("coletaExcremento.index", ["listaColetas" => $listaColetas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coleta = ColetaExcremento::find($id);
        $coleta->ativo = 0;
        $coleta->save();
        session()->put("info", "Registro removido!");
        $listaColetas = ColetaExcremento::all()->where("ativo", "!=", 0);
        return view("coletaExcremento.index", ["listaColetas" => $listaColetas]);
    }

}
