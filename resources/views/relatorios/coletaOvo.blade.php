@extends("_layouts.principal")

@section("title", "RELATÓRIO DE COLETA DE OVOS")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Coleta de Ovos</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Coleta de Ovos</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioColetaOvo")}}" method="POST">
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
                            <th>Ovos Coletados</th>
                            <th>Ovos Quebrados</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $ovosQuebrados =0;
                            $ovosColetados =0;
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
                                <td>{{$linha->quantidade_coletado}}</td>
                                <td>{{$linha->quantidade_quebrado}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                            </tr>
                            @php
                                $ovosQuebrados +=$linha->quantidade_quebrado;
                                $ovosColetados +=$linha->quantidade_coletado;
                            @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros {{sizeof($listaDados)}}</b></td>
                        <td><b>Ovos Coletados</b></td>
                        <td><b>{{$ovosColetados}}</b></td>
                        <td><b>Ovos Quebrados / Ovos Inteiros</b></td>
                        <td><b>{{$ovosQuebrados}} </b></td>
                        <td><b>{{$ovosColetados-$ovosQuebrados}}</b></td>
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