@extends("_layouts.principal")

@section("title", "RELATÓRIO DE VENDA DE OVOS")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Venda de Ovos</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Venda de Ovos</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioVendaOvo")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_venda);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_venda}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Final</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_venda);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_venda}}">{{$data}}</option>
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
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Unidades</th>
                            <th>Tipo Embalagem</th>
                            <th>Comprador</th>
                            <th>lote</th>
                            <th>Preço</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total12 =0;
                            $total30=0;
                            $totalVendas=0;
                        @endphp
                        @foreach($listaDados as $linha)
                            <tr>
                                @php
                                    $data = DateTime::createFromFormat('Y-m-d', $linha->data_venda);
                                    $data = date_format($data, 'd/m/Y');
                                    $hora = DateTime::createFromFormat('H:i:s', $linha->hora_venda);
                                    $hora = date_format($hora, 'H:i');
                                @endphp

                                <td>{{$data}}</td>
                                <td>{{$hora}} h</td>
                                <td>{{$linha->quantidade}}</td>
                                <td>{{$linha->tipo_embalagem}}</td>
                                <td>{{$linha->nome_comprador}}</td>
                                <td>{{$linha->lote}}</td>
                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                            </tr>
                            @php
                                $total12 = ($linha->tipo_embalagem == "12 Unidades") ? $total12+$linha->quantidade : $total12;
                                $total30 = ($linha->tipo_embalagem == "30 Unidades") ? $total30+$linha->quantidade : $total30;
                                $totalVendas +=$linha->preco;
                            @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros</b></td>
                        <td><b>{{sizeof($listaDados)}}</b></td>
                        <td><b>Valor total</b></td>
                        <td><b>R${{number_format($totalVendas,2,',','')}}</b></td>
                        <td><b>30 Unidades</b></td>
                        <td><b>{{$total30}}</b></td>
                        <td><b>12 Unidades</b></td>
                        <td><b>{{$total12}}</b></td>
                        <td><b></b></td>
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