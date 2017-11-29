@extends("_layouts.principal")

@section("title", "RELATÓRIO DE VENTILAÇÃO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Ventilação</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Ventilação</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioVentilacao")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_abertura);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_abertura}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_abertura);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_abertura}}">{{$data}}</option>
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
                            <th>Data Abertura</th>
                            <th>Hora Abertura</th>
                            <th>Data Fechamento</th>
                            <th>Hora Fechamento</th>
                            <th>Temperatura Mínima</th>
                            <th>Temperatura Média</th>
                            <th>Temperatura Máxima</th>
                            <th>Observações</th>
                            <th>Responsável</th>
                        </tr>

                        </thead>

                        <tbody>

                        @foreach($listaDados as $linha)
                            <tr>

                                @php
                                    $data_abertura = DateTime::createFromFormat('Y-m-d', $linha->data_abertura);
                                    $data_abertura = date_format($data_abertura, 'd/m/Y');
                                    $data_fechamento = DateTime::createFromFormat('Y-m-d', $linha->data_fechamento);
                                    $data_fechamento = date_format($data_fechamento, 'd/m/Y');
                                    $hora_abertura = DateTime::createFromFormat('H:i:s', $linha->hora_abertura);
                                    $hora_abertura = date_format($hora_abertura, 'H:i');
                                    $hora_fechamento = DateTime::createFromFormat('H:i:s', $linha->hora_fechamento);
                                    $hora_fechamento = date_format($hora_fechamento, 'H:i');
                                    $temperatura_media = ($linha->temperatura_maxima+$linha->temperatura_minima)/2;
                                @endphp

                                <td>{{$data_abertura}}</td>
                                <td>{{$hora_abertura}}h</td>
                                <td>{{$data_fechamento}}</td>
                                <td>{{$hora_fechamento}}h</td>
                                <td>{{number_format($linha->temperatura_minima,1,',','')}} Cº</td>
                                <td>{{number_format($temperatura_media,1,',','')}} Cº</td>
                                <td>{{number_format($linha->temperatura_maxima,1,',','')}} Cº</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                            </tr>
                        @endforeach


                        </tbody>

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