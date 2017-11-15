<?php

namespace App\Http\Controllers;

use App\Produto;
use App\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaTipoProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Produto::all()->where("ativo", "!=", 0);
        return view("tipoProduto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tipoProduto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::begginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("tipoProduto", ["dados" => $dados]);
        }
        $listaDados = TipoProduto::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("tipoProduto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = TipoProduto::find($id);
        return view("tipoProduto.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = TipoProduto::find($id);
        return view("tipoProduto.edit", ["dados" => $dados]);
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
        DB::begginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("tipoProduto.edit", ["dados" => $dados]);
        }
        $listaDados = TipoProduto::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("tipoProduto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = TipoProduto::find($id);
        $dados->ativo = 0;
        DB::begginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = TipoProduto::all()->where("ativo", "!=", 0);
        return view("tipoProduto.index", ["listaDados" => $listaDados]);
    }
}
