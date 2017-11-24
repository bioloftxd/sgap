<?php

namespace App\Http\Controllers;

use App\Gaiola;
use App\MorteAve;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlaMorteAve extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = MorteAve::all()->where("ativo", "!=", 0);
        return view("morteAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
        $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
        return view("morteAve.create", ["listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new MorteAve();
        $dados->data = ($request->data) ? $request->data : date("Y-m-d");
        $dados->hora = ($request->hora) ? $request->hora : date("H:i");
        $dados->id_gaiola = ($request->id_gaiola) ? $request->id_gaiola : null;
        $dados->quantidade_aves = ($request->quantidade_aves) ? $request->quantidade_aves : null;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : session()->get("usuario")->id;
        if ($request->id_gaiola == null) {
            session()->put("info", "Selecione a gaiola!");
            $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("morteAve.create", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
        } else {
            $gaiola = Gaiola::find($request->id_gaiola);
            if ($gaiola->quantidade_aves < $request->quantidade_aves) {
                session()->put("info", "Número de morte superior ao número de aves!");
                $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
                $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
                return view("morteAve.create", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
            } else {
                $gaiola->quantidade_aves = $gaiola->quantidade_aves - $request->quantidade_aves;
            }
        }
        if ($request->quantidade_aves == null || $request->quantidade_aves < 0) {
            session()->put("info", "Insira a quantidade de aves mortas!");
            $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("morteAve.create", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            $gaiola->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("morteAve.create", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
        }
        $listaDados = MorteAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro salvo!");
        return view("morteAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = MorteAve::find($id);
        return view("morteAve.show", ["dados" => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = MorteAve::find($id);
        $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
        $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
        return view("morteAve.edit", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
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
        $dados = MorteAve::find($id);
        $dados->data = ($request->data) ? $request->data : $dados->data;
        $dados->hora = ($request->hora) ? $request->hora : $dados->hora;
        $dados->observacoes = ($request->observacoes) ? $request->observacoes : "-";
        $dados->id_usuario = ($request->id_usuario) ? $request->id_usuario : $dados->id_usuario;

        $gaiola = Gaiola::find($dados->id_gaiola);

        if ($request->quantidade_aves > $dados->quantidade_aves) {
            if ($gaiola->quantidade_aves < $request->quantidade_aves - $dados->quantidade_aves) {
                $dados->quantidade_aves = ($request->quantidade_aves) ? $request->quantidade_aves : $dados->quantidade_aves;
                session()->put("info", "Número de morte superior ao número de aves!");
                $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
                $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
                return view("morteAve.edit", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
            } else {
                $gaiola->quantidade_aves -= $request->quantidade_aves - $dados->quantidade_aves;
                $dados->quantidade_aves = $request->quantidade_aves;
            }
        } else {
            $gaiola->quantidade_aves += $dados->quantidade_aves - $request->quantidade_aves;
            $dados->quantidade_aves = $request->quantidade_aves;
        }

        if ($request->quantidade_aves == null || $request->quantidade_aves < 0) {
            session()->put("info", "Insira a quantidade de aves mortas!");
            $listaGaiolas = Gaiola::all()->where("ativo", "!=", 0)->where("quantidade_aves", ">", 0);
            $listaUsuarios = Usuario::all()->where("ativo", "!=", 0);
            return view("morteAve.edit", ["dados" => $dados, "listaGaiolas" => $listaGaiolas, "listaUsuarios" => $listaUsuarios]);
        }
        DB::beginTransaction();
        try {
            $dados->save();
            $gaiola->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
            return view("morteAve.edit", ["dados" => $dados]);
        }
        $listaDados = MorteAve::all()->where("ativo", "!=", 0);
        session()->put("info", "Registro alterado!");
        return view("morteAve.index", ["listaDados" => $listaDados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = MorteAve::find($id);
        $dados->ativo = 0;
        $gaiola = Gaiola::find($dados->id_gaiola);
        $gaiola->quantidade_aves += $dados->quantidade_aves;
        DB::beginTransaction();
        try {
            $dados->save();
            $gaiola->save();
            DB::commit();
            session()->put("info", "Registro removido!");
        } catch (\Throwable $e) {
            DB::rollback();
            $erro = $e->errorInfo[1];
            session()->put("info", "Erro ao salvar! ($erro)");
        }
        $listaDados = MorteAve::all()->where("ativo", "!=", 0);
        return view("morteAve.index", ["listaDados" => $listaDados]);
    }
}
