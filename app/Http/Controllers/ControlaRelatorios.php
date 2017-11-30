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
use function Sodium\add;

class ControlaRelatorios extends Controller
{
    public function relatorioAlimentacao(Request $request)
    {
        $listaDatas = AlimentacaoAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = AlimentacaoAve::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = AlimentacaoAve::all()->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = AlimentacaoAve::all()->where("data", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = AlimentacaoAve::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.alimentacaoAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioAquisicao(Request $request)
    {
        $listaDatas = AquisicaoAve::all()->where("ativo", "!=", 0)->sortByDesc('data_chegada');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = AquisicaoAve::all()->where("data_chegada", ">=", $request->data_inicial)->where("data_chegada", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = AquisicaoAve::all()->where("data_chegada", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = AquisicaoAve::all()->where("data_chegada", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = AquisicaoAve::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.aquisicaoAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioColetaExcremento(Request $request)
    {
        $listaDatas = ColetaExcremento::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = ColetaExcremento::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = ColetaExcremento::all()->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = ColetaExcremento::all()->where("data", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = ColetaExcremento::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.coletaExcremento", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioColetaOvo(Request $request)
    {
        $listaDatas = ColetaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = ColetaOvo::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = ColetaOvo::all()->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = ColetaOvo::all()->where("data", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = ColetaOvo::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.coletaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioEmbalaOvo(Request $request)
    {
        $listaDatas = EmbalaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = EmbalaOvo::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = EmbalaOvo::all()->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = EmbalaOvo::all()->where("data", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = EmbalaOvo::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.embalaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioEstoque(Request $request)
    {
        $listaDados = [];
        if (isset($request->tipo_produto)) {
            $busca = Estoque::all()->where("ativo", "!=", 0);
            foreach ($busca as $item) {
                if ($item->produto->tipo_produto == $request->tipo_produto) {
                    $listaDados[] = $item;
                }
            }
        } else {
            $listaDados = Estoque::all()->where("ativo", "!=", 0);
        }

        return view("relatorios.estoque", ["listaDados" => $listaDados]);
    }

    public function relatorioFornecedor()
    {
        $listaDados = Fornecedor::all()->where("ativo", "!=", 0);
        return view("relatorios.fornecedor", ["listaDados" => $listaDados]);
    }

    public function relatorioFornecimento(Request $request)
    {
        $listaDatas = Fornecimento::all()->where("ativo", "!=", 0)->sortByDesc('data_fornecimento');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = Fornecimento::all()->where("data_fornecimento", ">=", $request->data_inicial)->where("data_fornecimento", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = Fornecimento::all()->where("data_fornecimento", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = Fornecimento::all()->where("data_fornecimento", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = Fornecimento::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.fornecimento", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioGaiola()
    {
        $listaDados = Gaiola::all()->where("ativo", "!=", 0);
        return view("relatorios.gaiola", ["listaDados" => $listaDados]);
    }

    public function relatorioManutencao(Request $request)
    {
        $listaDatas = ManutencaoAviario::all()->where("ativo", "!=", 0)->sortByDesc('data_verifica');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = ManutencaoAviario::all()->where("data_verifica", ">=", $request->data_inicial)->where("data_verifica", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = ManutencaoAviario::all()->where("data_verifica", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = ManutencaoAviario::all()->where("data_verifica", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = ManutencaoAviario::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.manutencao", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioMortalidade(Request $request)
    {
        $listaDatas = MorteAve::all()->where("ativo", "!=", 0)->sortByDesc('data');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = MorteAve::all()->where("data", ">=", $request->data_inicial)->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = MorteAve::all()->where("data", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = MorteAve::all()->where("data", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = MorteAve::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.mortalidadeAve", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioProduto(Request $request)
    {
        if (isset($request->tipo_produto)) {
            $listaDados = Produto::all()->where("ativo", "!=", 0)->where("tipo_produto", "=", $request->tipo_produto);
        } else {
            $listaDados = Produto::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.produto", ["listaDados" => $listaDados]);
    }

    public function relatorioVendaOvo(Request $request)
    {
        $listaDatas = VendaOvo::all()->where("ativo", "!=", 0)->sortByDesc('data_venda');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = VendaOvo::all()->where("data_venda", ">=", $request->data_inicial)->where("data_venda", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = VendaOvo::all()->where("data_venda", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = VendaOvo::all()->where("data_venda", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = VendaOvo::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.vendaOvo", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }

    public function relatorioVentilacao(Request $request)
    {
        $listaDatas = Ventilacao::all()->where("ativo", "!=", 0)->sortByDesc('data_abertura');
        if (isset($request->data_final) && isset($request->data_inicial)) {
            $listaDados = Ventilacao::all()->where("data_abertura", ">=", $request->data_inicial)->where("data_abertura", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_final)) {
            $listaDados = Ventilacao::all()->where("data_abertura", "<=", $request->data_final)->where("ativo", "!=", 0);
        } elseif (isset($request->data_inicial)) {
            $listaDados = Ventilacao::all()->where("data_abertura", ">=", $request->data_inicial)->where("ativo", "!=", 0);
        } else {
            $listaDados = Ventilacao::all()->where("ativo", "!=", 0);
        }
        return view("relatorios.ventilacao", ["listaDados" => $listaDados, "listaDatas" => $listaDatas]);
    }
}
