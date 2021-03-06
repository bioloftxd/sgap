<?php

namespace App\Http\Controllers;

use App\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaEstoque extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Estoque::all()->where("ativo", "!=", 0);
        return view("estoque.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Estoque::all()->where("ativo", "!=", 0);
        return view("estoque.index", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listaDados = Estoque::all()->where("ativo", "!=", 0);
        return view("estoque.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Estoque::find($id);
        return view("estoque.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Estoque::find($id);
        return view("estoque.edit", ["dados" => $dados]);
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
        $dados = Estoque::find($id);
        $dados->quantidade = ($request->quantidade != null) ? $request->quantidade : $dados->quantidade;
        $dados->preco = ($request->preco != null) ? $request->preco : $dados->preco;
        if ($request->quantidade == null) {
            session()->put("info", "Insira a quantiade de produto no estoque!");
            return view("estoque.edit", ["dados" => $dados]);
        }
        if ($request->preco == null) {
            session()->put("info", "Insira a preco do produto!");
            return view("estoque.edit", ["dados" => $dados]);
        }

        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("estoque.edit", ["dados" => $dados]);
        }
        $listaDados = Estoque::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("estoque.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Estoque::find($id);
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
        $listaDados = Estoque::all()->where("ativo", "!=", 0);
        return view("estoque.index", ["listaDados" => $listaDados]);
    }
}
