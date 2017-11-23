<?php

namespace App\Http\Controllers;

use App\ColetaOvo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaColetaOvo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = ColetaOvo::all()->where("ativo", "!=", 0);
        return view("coletaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("coletaOvo.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new ColetaOvo();
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->quantidade_coletado = ($request->quantidade_coletado) ? $request->quantidade_coletado : null;
        $dados->quantidade_quebrado = ($request->quantidade_quebrado) ? $request->quantidade_quebrado : 0;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->quantidade_coletado == 0) {
            session()->put("info", "Insira o total de ovos coletados!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("coletaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            dd($e);
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("coletaOvo.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = ColetaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("coletaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = ColetaOvo::find($id);
        return view("coletaOvo.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = ColetaOvo::find($id);
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("coletaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados   ]);
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
        $dados = ColetaOvo::find($id);
        $dados->data = ($request->data) ? $request->data : $dados->data;
        $dados->hora = ($request->hora) ? $request->hora : $dados->hora;
        $dados->quantidade_coletado = ($request->quantidade_coletado) ? $request->quantidade_coletado : $dados->quantidade_coletado;
        $dados->quantidade_quebrado = ($request->quantidade_quebrado) ? $request->quantidade_quebrado : $dados->quantidade_quebrado;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : $dados->observacoes;
        if ($request->quantidade_coletado == 0) {
            session()->put("info", "Insira o total de ovos coletados!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("coletaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
            return view("coletaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = ColetaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("coletaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = ColetaOvo::find($id);
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
        $listaDados = ColetaOvo::all()->where("ativo", "!=", 0);
        return view("coletaOvo.index", ["listaDados" => $listaDados]);
    }
}
