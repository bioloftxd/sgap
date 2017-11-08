<?php

namespace App\Http\Controllers;

use App\AquisicaoAve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaAquisicao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("aquisicaoAve.create");
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
            return view("aquisicaoAve.create", ["dados" => $dados]);
        }
        $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro Salvo!");
        return view("aquisicaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = AquisicaoAve::find($id);
        return view("aquisicaoAve.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = AquisicaoAve::find($id);
        return view("aquisicaoAve.show", ["dados" => $dados]);
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
            return view("aquisicaoAve.edit", ["dados" => $dados]);
        }
        $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("aquisicaoAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = AquisicaoAve::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro Removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar!($erro)");
            $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.index", ["listaDados" => $listaDados]);
        }
        $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.index", ["listaDados" => $listaDados]);
    }
}
