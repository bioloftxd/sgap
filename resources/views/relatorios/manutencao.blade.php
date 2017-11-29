@extends("_layouts.principal")

@section("title", "RELATÓRIO DE MANUTENÇÃO DO AVIÁRIO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Manutenção do Aviário</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Manutenção do Aviário</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioManutencao")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_verifica);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_verifica}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_verifica);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_verifica}}">{{$data}}</option>
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
                            <th>Data Ocorrência</th>
                            <th>Hora Ocorrência</th>
                            <th>Data Resolução</th>
                            <th>Hora Resolução</th>
                            <th>Usuário Identificador</th>
                            <th>Usuário Resolutor</th>
                            <th>Ocorrência</th>
                            <th>Resolução</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($listaDados as $linha)
                            <tr>

                                @php
                                    $dataOcorrencia = DateTime::createFromFormat('Y-m-d', $linha->data_verifica);
                                    $dataOcorrencia = date_format($dataOcorrencia, 'd/m/Y');
                                    $horaOcorrencia = DateTime::createFromFormat('H:i:s',$linha->hora_verifica);
                                    $horaOcorrencia = date_format($horaOcorrencia, 'H:i');
                                    $dataResolução = DateTime::createFromFormat('Y-m-d', $linha->data_resolve);
                                    $dataResolução = date_format($dataResolução, 'd/m/Y');
                                    $horaResolução = DateTime::createFromFormat('H:i:s',$linha->hora_resolve);
                                    $horaResolução = date_format($horaResolução, 'H:i');
                                @endphp

                                <td>{{$dataOcorrencia}}</td>
                                <td>{{$horaOcorrencia}} h</td>

                                @if($dataResolução == "11/09/2001")
                                    <td>-</td>
                                    <td>-</td>
                                @else
                                    <td>{{$dataResolução}}</td>
                                    <td>{{$horaResolução}}h</td>
                                @endif

                                <td>{{$linha->usuarioVerifica->nome}}</td>

                                @if($linha->id_usuario_resolve == 0)
                                    <td>-</td>
                                @else
                                    <td>{{$linha->usuarioResolve->nome}}</td>
                                @endif

                                <td>{{$linha->ocorrencia}}</td>

                                @if($linha->resolvido==0)
                                    <td>-</td>
                                @else
                                    <td>{{$linha->resolucao}}</td>
                                @endif
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