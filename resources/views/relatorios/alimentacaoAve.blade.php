@extends("_layouts.principal")

@section("title", "RELATÓRIO DE ALIMENTAÇÃO DAS AVES")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Alimentação das Aves</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Alimentação das Aves</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioAlimentacao")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data}}">{{$data}}</option>
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
                            <th>Quantidade Ração</th>
                            <th>Tipo Ração</th>
                            <th>Ração</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $totalRacao = 0;
                        @endphp
                        @foreach($listaDados as $linha)
                            <tr>
                                @php
                                    $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                    $data = date_format($data, 'd/m/Y');
                                    $hora = DateTime::createFromFormat('H:i:s', $linha->hora);
                                    $hora = date_format($hora, 'H:i');
                                @endphp
                                <td>{{$data}}</td>
                                <td>{{$hora}}h</td>
                                <td>{{number_format($linha->quantidade_alimento,2,',','')}} Kg</td>
                                <td>{{$linha->tipo_racao}}</td>
                                <td>{{$linha->produto->nome}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                                @php
                                    $totalRacao += $linha->quantidade_alimento;
                                @endphp
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros</b></td>
                        <td>{{sizeof($listaDados)}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Ração Consumida</b></td>
                        <td>{{number_format($totalRacao,2,',','')}} Kg</td>
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