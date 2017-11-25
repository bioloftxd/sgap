<?php

namespace App\Http\Controllers;

use App\AlimentacaoAve;
use Illuminate\Http\Request;

class ControlaRelatorios extends Controller
{

    public function alimentacao(Request $request)
    {
        $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
        return view("alimentacaoAve.show", ["listaDados" => $listaDados]);
    }
//    $dados = AlimentacaoAve::all()->where("data", ">=", "2000-10-25")->where("data", "<=", "2003-11-17");
}
