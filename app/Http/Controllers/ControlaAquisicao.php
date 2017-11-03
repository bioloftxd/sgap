<?php

namespace App\Http\Controllers;

use App\AquisicaoAve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ControlaAquisicao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaAquisicao = AquisicaoAve::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.index", ["listaAquisicao" => $listaAquisicao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("aquisicaoAve.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aquisicao = AquisicaoAve::find($id);
        return view("aquisicaoAve.show", ["aquisicao" => $aquisicao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aquisicao = AquisicaoAve::find($id);
        return view("aquisicao.show", ["aquisicao" => $aquisicao]);
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
        $aquisicao = AquisicaoAve::find($id);
        $aquisicao->ativo = 0;
        DB::beginTransaction();
        try {
            $aquisicao->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            session()->put("info", "Erro - $e !");
            $listaAquisicao = AquisicaoAve::all()->where("ativo", "!=", 0);
            return view("aquisicaoAve.index", ["listaAquisicao" => $listaAquisicao]);
        }


        session()->put("info", "Registro Removido!");
        $listaAquisicao = AquisicaoAve::all()->where("ativo", "!=", 0);
        return view("aquisicaoAve.index", ["listaAquisicao" => $listaAquisicao]);
    }
}
