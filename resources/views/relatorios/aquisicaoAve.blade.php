@extends("_layouts.principal")

@section("title", "RELATÓRIO DE AQUISIÇÃO DE AVES")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Aquisição de Aves</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Aquisição de Aves</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioAquisicao")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_chegada);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_chegada}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Final</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_chegada);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_chegada}}">{{$data}}</option>
                                @endforeach
                            </select>


                            <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--2-col-desktop mdl-cell--4-col-phone mdl-cell--2-col-tablet">
                                Filtrar
                            </button>

                            <div class="mdl-layout-spacer"></div>

                        </div>

                    </form>

                </div>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Data Recebimento</th>
                            <th>Data Saída</th>
                            <th>Total de Aves</th>
                            <th>Aves Mortas</th>
                            <th>Raça</th>
                            <th>Vacinas</th>
                            <th>Idade</th>
                            <th>Preço</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $totalAves=0;
                            $totalAvesMortas=0;
                            $totalPreco=0;
                        @endphp
                        @foreach($listaDados as $linha)
                            <tr>
                                @php
                                    $data_chegada = DateTime::createFromFormat('Y-m-d', $linha->data_chegada);
                                    $data_chegada = date_format($data_chegada, 'd/m/Y');
                                    $data_saida = DateTime::createFromFormat('Y-m-d', $linha->data_saida);
                                    $data_saida = date_format($data_saida, 'd/m/Y');
                                @endphp

                                <td>{{$data_chegada}}</td>
                                <td>{{$data_saida}}</td>
                                <td>{{$linha->quantidade_total}}</td>
                                <td>{{$linha->quantidade_morta}}</td>
                                <td>{{$linha->raca}}</td>
                                <td>{{$linha->vacinas}}</td>

                                @if ($linha->idade < 30)
                                    @php
                                        $dias = $linha->idade;
                                    @endphp
                                    <td>{{$dias}}d</td>
                                @elseif ($linha->idade > 30 && $linha->idade < 365)
                                    @php
                                        $meses = intdiv($linha->idade, 30);
                                        $dias = $linha->idade % 30;
                                    @endphp
                                    @if($dias ==0)
                                        <td>{{$meses}}m</td>
                                    @else
                                        <td>{{$dias}}d.{{$meses}}m</td>
                                    @endif
                                @else ($linha->idade > 365)
                                    @php
                                        $anos = intdiv($linha->idade, 365);
                                        $meses = ($linha->idade) - ($anos * 365);
                                        $meses = intdiv($meses, 30);
                                        $dias = $linha->idade % 365;
                                        $dias = $dias % 30;
                                    @endphp
                                    @if($dias ==0)
                                        <td>{{$meses}}m.{{$anos}}a</td>
                                    @else
                                        <td>{{$dias}}d.{{$meses}}m.{{$anos}}a</td>
                                    @endif
                                @endif

                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                            </tr>
                            @php
                                $totalAves += $linha->quantidade_total;
                                $totalAvesMortas += $linha->quantidade_morta;
                                $totalPreco += $linha->preco;
                            @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros</b></td>
                        <td><b>{{sizeof($listaDados)}}</b></td>
                        <td><b>Aves Vivas</b></td>
                        <td><b>{{$totalAves-$totalAvesMortas}}</b></td>
                        <td><b>Aves Mortas</b></td>
                        <td><b>{{$totalAvesMortas}}</b></td>
                        <td><b>Total de Aves</b></td>
                        <td><b>{{$totalAves}}</b></td>
                        <td><b>Preço Total</b></td>
                        <td><b>R${{number_format($totalPreco,2,',','')}}</b></td>

                        </tfoot>
                    </table>

                </div>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

    @include("_includes.relatorio")

@stop