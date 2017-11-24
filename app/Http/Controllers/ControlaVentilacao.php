<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Ventilacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaVentilacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Ventilacao::all()->where("ativo", "!=", 0);
        return view("ventilacao.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("ventilacao.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new Ventilacao();
        $dados->data_abertura = ($request->data_abertura) ? $request->data_abertura : date("Y-m-d");
        $dados->hora_abertura = ($request->hora_abertura) ? $request->hora_abertura : date("H:i");
        $dados->data_fechamento = ($request->data_fechamento) ? $request->data_fechamento : date("Y-m-d");
        $dados->hora_fechamento = ($request->hora_fechamento) ? $request->hora_fechamento : date("H:i");
        $dados->temperatura_maxima = ($request->temperatura_maxima) ? $request->temperatura_maxima : null;
        $dados->temperatura_minima = ($request->temperatura_minima) ? $request->temperatura_minima : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->temperatura_maxima == null) {
            session()->put("info", "Insira a temperatura máxima!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("ventilacao.create", ["listaDados" => $listaDados]);
        }
        if ($request->temperatura_minima == null) {
            session()->put("info", "Insira a temperatura mínima!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("ventilacao.create", ["listaDados" => $listaDados]);
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
            return view("ventilacao.create", ["listaDados" => $listaDados]);
        }
        $listaDados = Ventilacao::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("ventilacao.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Ventilacao::find($id);
        return view("ventilacao.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Ventilacao::find($id);
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("ventilacao.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $dados = Ventilacao::find($id);
        $dados->data_abertura = ($request->data_abertura) ? $request->data_abertura : $dados->data_abertura;
        $dados->hora_abertura = ($request->hora_abertura) ? $request->hora_abertura : $dados->hora_abertura;
        $dados->data_fechamento = ($request->data_fechamento) ? $request->data_fechamento : $dados->data_fechamento;
        $dados->hora_fechamento = ($request->hora_fechamento) ? $request->hora_fechamento : $dados->hora_fechamento;
        $dados->temperatura_maxima = ($request->temperatura_maxima) ? $request->temperatura_maxima : $dados->temperatura_maxima;
        $dados->temperatura_minima = ($request->temperatura_minima) ? $request->temperatura_minima : $dados->temperatura_minima;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->temperatura_maxima == null) {
            session()->put("info", "Insira a temperatura máxima!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("ventilacao.edit", ["listaDados" => $listaDados]);
        }
        if ($request->temperatura_minima == null) {
            session()->put("info", "Insira a temperatura mínima!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("ventilacao.edit", ["listaDados" => $listaDados]);
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
            return view("ventilacao.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        $listaDados = Ventilacao::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("ventilacao.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Ventilacao::find($id);
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
        $listaDados = Ventilacao::all()->where("ativo", "!=", 0);
        return view("ventilacao.index", ["listaDados" => $listaDados]);

    }
}
