<?php

namespace App\Http\Controllers;

use App\ColetaOvo;
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
        return view("coletaOvo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("coletaOvo.create", ["dados" => $dados]);
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
        return view("coletaOvo.edit", ["dados" => $dados]);
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
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("coletaOvo.edit", ["dados" => $dados]);
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
