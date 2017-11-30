@extends("_layouts.principal")

@section("title", "RELATÓRIO DE COLETA DE EXCREMENTO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Coleta de Excremento</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Coleta de Excremento</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioColetaExcremento")}}" method="POST">
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
                                <option selected disabled value="null">Data Final</option>
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
                            <th>Litros</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $totalExcremento =0;
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
                                <td>{{$hora}} h</td>
                                <td>{{number_format($linha->litros,1,',','')}} L</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                            </tr>
                            @php
                                $totalExcremento +=$linha->litros;
                            @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros</b></td>
                        <td><b>{{sizeof($listaDados)}}</b></td>
                        <td></td>
                        <td><b>Coleta Total</b></td>
                        <td><b>{{number_format($totalExcremento,1,',','')}} L</b></td>
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