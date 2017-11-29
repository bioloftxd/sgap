<?php

namespace App\Http\Controllers;

use App\AlimentacaoAve;
use App\AquisicaoAve;
use App\ColetaExcremento;
use App\ColetaOvo;
use App\EmbalaOvo;
use App\Estoque;
use App\Fornecedor;
use App\Fornecimento;
use App\Gaiola;
use App\ManutencaoAviario;
use App\MorteAve;
use App\Produto;
use App\VendaOvo;
use App\Ventilacao;
use Illuminate\Http\Request;

class ControlaRelatorios extends Controller
{
    public function relatorioAlimentacao(Request $request)
    {
        $listaDatas = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = AlimentacaoAve::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final);
        } elseif (isset($request->data_final)) {
            $listaDados = AlimentacaoAve::all()->where("data", "<=", $request->data_final);
        } elseif (isset($request->data_inicial)) {
            $listaDados = AlimentacaoAve::all()->where("data", ">=", $request->data_inicial);
        } else {
            $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.alimentacaoAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioAquisicao(Request $request)
    {
        $listaDatas = AquisicaoAve::all()->where("ativo", "!=", 0)->sortByDesc('data_chegada');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = AquisicaoAve::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final);
        } elseif (isset($request->data_final)) {
            $listaDados = AquisicaoAve::all()->where("data", "<=", $request->data_final);
        } elseif (isset($request->data_inicial)) {
            $listaDados = AquisicaoAve::all()->where("data", ">=", $request->data_inicial);
        } else {
            $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.aquisicaoAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioColetaExcremento(Request $request)
    {
        $listaDatas = ColetaExcremento::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.coletaExcremento", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioColetaOvo(Request $request)
    {
        $listaDatas = ColetaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = ColetaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.coletaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioEmbalaOvo(Request $request)
    {
        $listaDatas = EmbalaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.embalaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioEstoque(Request $request)
    {
        $listaDatas = Estoque::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->tipo_produto)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->tipo_produto;
        } else {
            $listaDados = Estoque::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.estoque", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioFornecedor()
    {
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        return view("relatorios.fornecedor", ["listaDados" => $listaDados]);
    }

    public function relatorioFornecimento(Request $request)
    {
        $listaDatas = Fornecimento::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = Fornecimento::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.fornecimento", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioGaiola()
    {
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        return view("relatorios.gaiola", ["listaDados" => $listaDados]);
    }

    public function relatorioManutencao(Request $request)
    {
        $listaDatas = ManutencaoAviario::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.manutencao", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioMortalidade(Request $request)
    {
        $listaDatas = MorteAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = MorteAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.mortalidadeAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioProduto(Request $request)
    {
        if (isset($request->tipo_produto)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->tipo_produto;
        } else {
            $listaDados = Produto::all()->where("ativo", "!=", 0);
            return view("relatorios.produto", ["listaDados" => $listaDados]);
        }
    }

    public function relatorioVendaOvo(Request $request)
    {
        $listaDatas = VendaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data_venda');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = VendaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.vendaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }

    public function relatorioVentilacao(Request $request)
    {
        $listaDatas = Ventilacao::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            //$listaDados = modelo::all()->where("data", ">=", "$data_inicial")->where("data", "<=", "$data_final");
            echo $request->data_inicial . "    -    " . $request->data_final;
        } elseif (isset($request->data_final)) {
            //Data Final e anteriores;
            echo $request->data_final;
        } elseif (isset($request->data_inicial)) {
            //Data Inicial em diante;
            echo $request->data_inicial;
        } else {
            $listaDados = Ventilacao::all()->where("ativo", "!=", 0)->sortByDesc('data');
            return view("relatorios.ventilacao", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
        }
    }
}
