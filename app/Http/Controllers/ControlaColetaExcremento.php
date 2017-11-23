<?php

namespace App\Http\Controllers;

use App\ColetaExcremento;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaColetaExcremento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0);
        return view("coletaExcremento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("coletaExcremento.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new ColetaExcremento();
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->litros = ($request->litros) ? $request->litros : 1;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("coletaExcremento.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("coletaExcremento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = ColetaExcremento::find($id);
        return view("coletaExcremento.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = ColetaExcremento::find($id);
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("coletaExcremento.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $dados = ColetaExcremento::find($id);
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->litros = ($request->litros) ? $request->litros : 1;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("coletaExcremento.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("coletaExcremento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = ColetaExcremento::find($id);
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
        $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0);
        return view("coletaExcremento.index", ["listaDados" => $listaDados]);
    }
}
