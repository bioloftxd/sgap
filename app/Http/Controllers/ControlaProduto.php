<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Produto::all()->where("ativo", "!=", 0);
        return view("produto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("produto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtos = Produto::all()->where("ativo", "!=", 0);
        $dados = new Produto();
        $dados->nome = ($request->nome) ? $request->nome : null;
        $dados->marca = ($request->marca) ? $request->marca : "-";
        $dados->tipo_produto = ($request->tipo_produto) ? $request->tipo_produto : null;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->nome == null) {
            session()->put("info", "Insira o nome do produto!");
            return view("produto.create", ["dados" => $dados]);
        }
        if ($request->tipo_produto == null) {
            session()->put("info", "Selecione o tipo de produto!");
            return view("produto.create", ["dados" => $dados]);
        }
        foreach ($produtos as $produto) {
            if ($produto->nome == $dados->nome && $produto->marca == $dados->marca) {
                if ($produto->tipo_produto == $dados->tipo_produto) {
                    session()->put("info", "Produto já registrado!");
                    return view("produto.create", ["dados" => $dados]);
                }
            }
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("produto.create", ["dados" => $dados]);
        }
        $listaDados = Produto::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("produto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Produto::find($id);
        return view("produto.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Produto::find($id);
        return view("produto.edit", ["dados" => $dados]);
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
        $produtos = Produto::all()->where("ativo", "!=", 0);
        $dados = Produto::find($id);
        $dados->nome = ($request->nome) ? $request->nome : $dados->nome;
        $dados->marca = ($request->marca) ? $request->marca : "-";
        $dados->tipo_produto = ($request->tipo_produto) ? $request->tipo_produto : $dados->tipo_produto;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->nome == null) {
            session()->put("info", "Insira o nome do produto!");
            return view("produto.edit", ["dados" => $dados]);
        }
        if ($request->tipo_produto == null) {
            session()->put("info", "Selecione o tipo de produto!");
            return view("produto.edit", ["dados" => $dados]);
        }
        foreach ($produtos as $produto) {
            if ($produto->nome == $dados->nome && $produto->marca == $dados->marca) {
                if ($produto->tipo_produto == $dados->tipo_produto) {
                    session()->put("info", "Produto já registrado!");
                    return view("produto.edit", ["dados" => $dados]);
                }
            }
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("produto.edit", ["dados" => $dados]);
        }
        $listaDados = Produto::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("produto.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Produto::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->erroInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = Produto::all()->where("ativo", "!=", 0);
        return view("produto.index", ["listaDados" => $listaDados]);
    }
}
