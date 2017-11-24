<?php

namespace App\Http\Controllers;

use App\Gaiola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaGaiola extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        return view("gaiola.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("gaiola.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new Gaiola();
        $dados->numero_gaiola = ($request->numero_gaiola) ? $request->numero_gaiola : null;
        $dados->quantidade_aves = ($request->quantidade_aves >= 0) ? $request->quantidade_aves : null;
        $verifica = Gaiola::all()->where("ativo", "!=", 0);
        foreach ($verifica as $gaiola) {
            if ($gaiola->numero_gaiola == $request->numero_gaiola) {
                session()->put("info", "Nº de gaiola já cadastrado!");
                return view("gaiola.create", ["dados" => $dados]);
            }
        }
        if ($request->numero_gaiola == null) {
            session()->put("info", "Insira número da gaiola!");
            return view("gaiola.create", ["dados" => $dados]);
        }
        if ($request->quantidade_aves == null || $request->quantidade_aves < 0) {
            session()->put("info", "Insira número de aves!");
            return view("gaiola.create", ["dados" => $dados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("gaiola.create", ["dados" => $dados]);
        }
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("gaiola.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Gaiola::find($id);
        return view("gaiola.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Gaiola::find($id);
        return view("gaiola.edit", ["dados" => $dados]);
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
        $dados = Gaiola::find($id);
        $dados->quantidade_aves = ($request->quantidade_aves >= 0) ? $request->quantidade_aves : $dados->quantidade_aves;
        if ($dados->numero_gaiola != $request->numero_gaiola) {
            $verifica = Gaiola::all()->where("ativo", "!=", 0);
            foreach ($verifica as $gaiola) {
                if ($gaiola->numero_gaiola == $request->numero_gaiola) {
                    session()->put("info", "Nº de gaiola já cadastrado!");
                    return view("gaiola.edit", ["dados" => $dados]);
                }
            }
            $dados->numero_gaiola = ($request->numero_gaiola) ? $request->numero_gaiola : $dados->numero_gaiola;
        }
        if ($request->numero_gaiola == null) {
            session()->put("info", "Insira número da gaiola!");
            return view("gaiola.edit", ["dados" => $dados]);
        }
        if ($request->quantidade_aves == null || $request->quantidade_aves < 0) {
            session()->put("info", "Insira número de aves!");
            return view("gaiola.edit", ["dados" => $dados]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("gaiola.edit", ["dados" => $dados]);
        }
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("gaiola.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Gaiola::find($id);
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
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        return view("gaiola.index", ["listaDados" => $listaDados]);
    }
}
