<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Fornecedor;
use App\Fornecimento;
use App\Produto;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaFornecimento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Fornecimento::all()->where("ativo", "!=", 0);
        return view("fornecimento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaProdutos = Produto::all()->where("ativo", "!=", 0);
        $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
        $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
        return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new Fornecimento();
        $dados->lote = ($request->lote) ? $request->lote : "-";
        $dados->quantidade = ($request->quantidade) ? $request->quantidade : null;
        $dados->data_fornecimento = ($request->data_fornecimento) ? $request->data_fornecimento : date("Y-m-d");
        $dados->preco = ($request->preco) ? $request->preco : null;
        $dados->data_fabricacao = ($request->data_fabricacao) ? $request->data_fabricacao : date("Y-m-d");
        $dados->data_validade = ($request->data_validade) ? $request->data_validade : date('Y-m-d', strtotime(date("Y-m-d") . ' + 1 year'));
        $dados->numero_nf = ($request->numero_nf) ? $request->numero_nf : null;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->id_produto = ($request->id_produto) ? $request->id_produto : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->id_fornecedor = ($request->id_fornecedor) ? $request->id_fornecedor : null;
        if ($request->quantidade == null) {
            session()->put("info", "Insira a quantidade de produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->preco == null) {
            session()->put("info", "Insira o valor de produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->numero_nf == null) {
            session()->put("info", "Insira  número da nota fiscal!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->id_produto == null) {
            session()->put("info", "Selecione o produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->id_fornecedor == null) {
            session()->put("info", "Selecione o fornecedor!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        $estoque = Estoque::where("id_produto", "=", $dados->id_produto)->first();
        $estoque->preco = $dados->preco / $dados->quantidade;
        $estoque->quantidade += $dados->quantidade;
        DB::beginTransaction();
        try {
            $dados->save();
            $estoque->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.create", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        $listaDados = Fornecimento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("fornecimento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Fornecimento::find($id);
        return view("fornecimento.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaProdutos = Produto::all()->where("ativo", "!=", 0);
        $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
        $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
        $dados = Fornecimento::find($id);
        return view("fornecimento.edit", ["dados" => $dados, "listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios]);
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
        $dados = Fornecimento::find($id);
        $dados->lote = ($request->lote) ? $request->lote : $dados->lote;
        $dados->data_fornecimento = ($request->data_fornecimento) ? $request->data_fornecimento : $dados->data_fornecimento;
        $dados->preco = ($request->preco) ? $request->preco : $dados->preco;
        $dados->data_fabricacao = ($request->data_fabricacao) ? $request->data_fabricacao : $dados->data_fabricacao;
        $dados->data_validade = ($request->data_validade) ? $request->data_validade : $dados->data_validade;
        $dados->numero_nf = ($request->numero_nf) ? $request->numero_nf : $dados->numero_nf;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->id_produto = ($request->id_produto) ? $request->id_produto : $dados->id_produto;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;
        $dados->id_fornecedor = ($request->id_fornecedor) ? $request->id_fornecedor : $dados->id_fornecedor;
        if ($request->quantidade == null) {
            session()->put("info", "Insira a quantidade de produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.edit", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->preco == null) {
            session()->put("info", "Insira o valor de produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.edit", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->numero_nf == null) {
            session()->put("info", "Insira  número da nota fiscal!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.edit", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->id_produto == null) {
            session()->put("info", "Selecione o produto!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.edit", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        if ($request->id_fornecedor == null) {
            session()->put("info", "Selecione o fornecedor!");
            $listaProdutos = Produto::all()->where("ativo", "!=", 0);
            $listaFornecedores = Fornecedor::all()->where("ativo", "!=", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("fornecimento.edit", ["listaProdutos" => $listaProdutos, "listaFornecedores" => $listaFornecedores, "listaUsuarios" => $listaUsuarios, "dados" => $dados]);
        }
        $estoque = Estoque::where("id_produto", "=", $dados->id_produto)->first();
        $estoque->preco = $dados->preco / $dados->quantidade;

        if ($request->quantidade < $dados->quantidade) {
            $estoque->quantidade += $dados->quantidade - $request->quantidade;
            $dados->quantidade = $request->quantidade;
        } else {
            $estoque->quantidade -= $request->quantidade - $dados->quantidade;
            $dados->quantidade = $request->quantidade;
        }
        DB::beginTransaction();
        try {
            $dados->save();
            $estoque->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("fornecimento.edit", ["dados" => $dados]);
        }
        $listaDados = Fornecimento::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("fornecimento.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Fornecimento::find($id);
        $dados->ativo = 0;
        $estoque = Estoque::where("id_produto", "=", $dados->id_produto)->first();
        $estoque->quantidade -= $dados->quantidade;
        DB::beginTransaction();
        try {
            $dados->save();
            $estoque->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = Fornecimento::all()->where("ativo", "!=", 0);
        return view("fornecimento.index", ["listaDados" => $listaDados]);
    }
}
