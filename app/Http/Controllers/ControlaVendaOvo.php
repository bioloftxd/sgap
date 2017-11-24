<?php

namespace App\Http\Controllers;

use App\EmbalaOvo;
use App\Usuario;
use App\VendaOvo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaVendaOvo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = VendaOvo::all()->where("ativo", "!=", 0);
        return view("vendaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
        return view("vendaOvo.create", ["listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new VendaOvo();
        $dados->data_venda = ($request->data_venda) ? $request->data_venda : date("Y-m-d");
        $dados->hora_venda = ($request->hora_venda) ? $request->hora_venda : date("H:i");
        $dados->quantidade = ($request->quantidade) ? $request->quantidade : null;
        $dados->nome_comprador = ($request->nome_comprador) ? $request->nome_comprador : null;
        $dados->lote = ($request->lote) ? $request->lote : null;
        $dados->preco = ($request->preco) ? $request->preco : null;
        $dados->tipo_embalagem = ($request->tipo_embalagem) ? $request->tipo_embalagem : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->quantidade == null) {
            session()->put("info", "Insira o total de embalagens vendidas!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->quantidade == null) {
            session()->put("info", "Insira o nome do comprador!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->lote == null) {
            session()->put("info", "Selecione o lote da embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->quantidade == null) {
            session()->put("info", "Insira o valor total da venda!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->tipo_embalagem == null) {
            session()->put("info", "Selecione o tipo de embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
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
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.create", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        $listaDados = VendaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("vendaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = VendaOvo::find($id);
        return view("vendaOvo.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
        $dados = VendaOvo::find($id);
        return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
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
        $dados = VendaOvo::find($id);
        $dados->data_venda = ($request->data_venda) ? $request->data_venda : date("Y-m-d");
        $dados->hora_venda = ($request->hora_venda) ? $request->hora_venda : date("H:i");
        $dados->quantidade = ($request->quantidade) ? $request->quantidade : null;
        $dados->nome_comprador = ($request->nome_comprador) ? $request->nome_comprador : null;
        $dados->lote = ($request->lote) ? $request->lote : null;
        $dados->preco = ($request->preco) ? $request->preco : null;
        $dados->tipo_embalagem = ($request->tipo_embalagem) ? $request->tipo_embalagem : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->quantidade == null) {
            session()->put("info", "Insira o total de embalagens vendidas!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->quantidade == null) {
            session()->put("info", "Insira o nome do comprador!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->lote == null) {
            session()->put("info", "Selecione o lote da embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->quantidade == null) {
            session()->put("info", "Insira o valor total da venda!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        if ($request->tipo_embalagem == null) {
            session()->put("info", "Selecione o tipo de embalagens!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            $listaEmbalagens = EmbalaOvo::all()->where("ativo", "!=", 0);
            return view("vendaOvo.edit", ["dados" => $dados, "listaDados" => $listaDados, "listaEmbalagens" => $listaEmbalagens]);
        }
        $listaDados = VendaOvo::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("vendaOvo.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = VendaOvo::find($id);
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
        $listaDados = VendaOvo::all()->where("ativo", "!=", 0);
        return view("vendaOvo.index", ["listaDados" => $listaDados]);
    }
}
