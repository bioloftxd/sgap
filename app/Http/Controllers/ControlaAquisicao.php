<?php

namespace App\Http\Controllers;

use App\AquisicaoAve;
use App\Usuario;
use Illuminate\Http\RedirectResponse;
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
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.create", ["listaDados" => $listaDados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new AquisicaoAve();
        $dados->data_chegada = ($request->data_chegada) ? $request->data_chegada : date("Y-m-d");
        $dados->hora_chegada = ($request->hora_chegada) ? $request->hora_chegada : date("H:i");
        $dados->data_saida = ($request->data_saida) ? $request->data_saida : date("Y-m-d");
        $dados->hora_saida = ($request->hora_saida) ? $request->hora_saida : date("H:i");
        $dados->numero_gta = ($request->numero_gta) ? $request->numero_gta : "-";
        $dados->numero_nf = ($request->numero_nf) ? $request->numero_nf : "-";
        $dados->quantidade_total = ($request->quantidade_total) ? $request->quantidade_total : null;
        $dados->quantidade_morta = ($request->quantidade_morta) ? $request->quantidade_morta : 0;
        $dados->raca = ($request->raca) ? $request->raca : "-";
        if ($request->vacinas != null) {
            for ($i = 0; $i < sizeof($request->vacinas); $i++) {
                if ($i != sizeof($request->vacinas) - 1) {
                    $dados->vacinas .= $request->vacinas[$i] . ", ";
                } else {
                    $dados->vacinas .= $request->vacinas[$i];
                }
            }
        } else {
            $dados->vacinas = "-";
        }
        $dias = $request->dias;
        $dias += $request->meses * 30;
        $dias += $request->anos * 365;
        $dados->idade = ($dias) ? $dias : null;
        $dados->preco = ($request->preco) ? $request->preco : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->quantidade_total == null || $request->quantidade_total == 0) {
            session()->put("info", "Insira o total de aves recebida!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->preco == null || $request->preco == 0) {
            session()->put("info", "Insira o valor total da aquisição!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($dados->idade == null) {
            session()->put("info", "Insira a idade do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($dias == null) {
            session()->put("info", "Insira a idade do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->raca == null) {
            session()->put("info", "Insira a raça do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
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
            return view("aquisicaoAve.create", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $listaDados = Usuario::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
        $dados = AquisicaoAve::find($id);
        $dados->data_chegada = ($request->data_chegada) ? $request->data_chegada : $dados->data_chegada;
        $dados->hora_chegada = ($request->hora_chegada) ? $request->hora_chegada : $dados->hora_chegada;
        $dados->data_saida = ($request->data_saida) ? $request->data_saida : $dados->data_saida;
        $dados->hora_saida = ($request->hora_saida) ? $request->hora_saida : $dados->hora_saida;
        $dados->numero_gta = ($request->numero_gta) ? $request->numero_gta : $dados->numero_gta;
        $dados->numero_nf = ($request->numero_nf) ? $request->numero_nf : $dados->numero_nf;
        $dados->quantidade_total = ($request->quantidade_total) ? $request->quantidade_total : $dados->quantidade_total;
        $dados->quantidade_morta = ($request->quantidade_morta) ? $request->quantidade_morta : $dados->quantidade_morta;
        $dados->raca = ($request->raca) ? $request->raca : $dados->raca;
        $dados->preco = ($request->preco) ? $request->preco : null;
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        if ($request->vacinas != null) {
            $dados->vacinas = "";
            for ($i = 0; $i < sizeof($request->vacinas); $i++) {
                if ($i != sizeof($request->vacinas) - 1) {
                    $dados->vacinas .= $request->vacinas[$i] . ", ";
                } else {
                    $dados->vacinas .= $request->vacinas[$i];
                }
            }
        } else {
            $dados->vacinas = "-";
        }
        $dias = $request->dias;
        $dias += $request->meses * 30;
        $dias += $request->anos * 365;
        $dados->idade = ($dias) ? $dias : null;


        if ($request->quantidade_total == null || $request->quantidade_total == 0) {
            session()->put("info", "Insira o total de aves recebida!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->preco == null || $request->preco == 0) {
            session()->put("info", "Insira o valor total da aquisição!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($request->raca == null) {
            session()->put("info", "Insira a raça do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($dados->idade == null) {
            session()->put("info", "Insira a idade do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
        }
        if ($dias == null) {
            session()->put("info", "Insira a idade do lote!");
            $listaDados = Usuario::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
            return view("aquisicaoAve.edit", ["dados" => $dados, "listaDados" => $listaDados]);
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
