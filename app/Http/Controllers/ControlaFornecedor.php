<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaFornecedor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        return view("fornecedor.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fornecedor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new Fornecedor();
        $dados->nome = ($request->nome) ? $request->nome : null;
        $dados->cpf_cnpj = ($request->cpf_cnpj) ? $request->cpf_cnpj : null;
        $dados->telefone = ($request->telefone) ? $request->telefone : "-";
        $dados->endereco = ($request->endereco) ? $request->endereco : "-";
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->nome == null) {
            session()->put("info", "Insira o nome do fornecedor!");
            return view("fornecedor.create", ["dados" => $dados]);
        }
        if ($request->cpf_cnpj == null) {
            session()->put("info", "Insira o CPF ou CNPJ!");
            return view("fornecedor.create", ["dados" => $dados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("fornecedor.create", ["dados" => $dados]);
        }
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("fornecedor.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Fornecedor::find($id);
        return view("fornecedor.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Fornecedor::find($id);
        return view("fornecedor.edit", ["dados" => $dados]);
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
        $dados = Fornecedor::find($id);
        $dados->nome = ($request->nome) ? $request->nome : $dados->nome;
        $dados->cpf_cnpj = ($request->cpf_cnpj) ? $request->cpf_cnpj : $dados->cpf_cnpj;
        $dados->telefone = ($request->telefone) ? $request->telefone : $dados->telefone;
        $dados->endereco = ($request->endereco) ? $request->endereco : $dados->endereco;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->nome == null) {
            session()->put("info", "Insira o nome do fornecedor!");
            return view("fornecedor.edit", ["dados" => $dados]);
        }
        if ($request->cpf_cnpj == null) {
            session()->put("info", "Insira o CPF ou CNPJ!");
            return view("fornecedor.edit", ["dados" => $dados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorCode[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("fornecedor.create", ["dados" => $dados]);
        }
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("fornecedor.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Fornecedor::find($id);
        $dados->ativo = 0;
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar!");
        }
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        return view("fornecedor.index", ["listaDados" => $listaDados]);
    }
}
