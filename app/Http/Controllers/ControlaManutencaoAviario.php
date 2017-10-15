<?php

namespace App\Http\Controllers;

use App\ManutencaoAviario;
use Illuminate\Http\Request;

class ControlaManutencaoAviario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists("usuario")) {
            $listaManutencoes = ManutencaoAviario::all()->where("ativo", "!=", 0);
            return view("manutencaoAviario.index", ["listaManutencoes" => $listaManutencoes]);
        } else {
            return view("autentica");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("manutencaoAviario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manutencao = new ManutencaoAviario();

        $manutencao->id_usuario_verifica = session()->get("usuario")->id;
        $manutencao->id_usuario_resolve = 0;
        $manutencao->data_verifica = ($request->dataOcorrencia) ? $request->dataOcorrencia : date("Y-m-j");
        $manutencao->hora_verifica = ($request->horaOcorrencia) ? $request->horaOcorrencia : date("H:i");
        $manutencao->data_resolve = "2001-09-11";
        $manutencao->hora_resolve = "00:00";
        $manutencao->numero_relatorio = ($request->numeroRelatorio) ? $request->numeroRelatorio : 0;
        $manutencao->observacoes = ($request->observacoes) ? $request->observacoes : "Sem Observações!";
        $manutencao->save();

        session()->put("info", "Registro salvo!");
        $listaManutencoes = ManutencaoAviario::all()->where("ativo", "!=", 0);
        return view("manutencaoAviario.index", ["listaManutencoes" => $listaManutencoes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function storeResolve($id, Request $request)
    {
        dd($id);
//        $manutencao = ManutencaoAviario::find($id);
//
//        $manutencao->data_resolve = ($request->dataResolve) ? $request->dataResolve : date("Y-m-j");
//        $manutencao->hora_resolve = ($request->horaResolve) ? $request->horaResolve : date("H:i");
//        $manutencao->id_usuario_resolve = session()->get("usuario")->id;
//        $manutencao->resolvido = 1;
//        $manutencao->save();
//
//        $listaManutencoes = ManutencaoAviario::all()->where("ativo", "!=", 0);
//        session()->put("info", "Registro Salvo!");
//        return view("manutencaoAviario.index", ["listaManutencoes" => $listaManutencoes]);

    }

    public function resolver($id)
    {
        $manutencao = ManutencaoAviario::find($id);
        return view("manutencaoAviario.resolver", ["manutencao" => $manutencao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manutencao = ManutencaoAviario::find($id);
        return view("manutencaoAviario.edit", ["manutencao" => $manutencao]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manutencao = ManutencaoAviario::find($id);

        if ($manutencao->ativo == 0) {
            session()->forget("info");
            $listaManutencoes = ManutencaoAviario::all()->where("ativo", "!=", 0);
            return view("manutencaoAviario.index", ["listaManutencoes" => $listaManutencoes]);
        } else {
            $manutencao->ativo = 0;
            $manutencao->save();

            $listaManutencoes = ManutencaoAviario::all()->where("ativo", "!=", 0);
            session()->put("info", "Dados da ocorrência removidos!");
            return view("manutencaoAviario.index", ["listaManutencoes" => $listaManutencoes]);
        }


    }
}
