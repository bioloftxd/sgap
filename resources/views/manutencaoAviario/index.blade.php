@extends("_layouts.principal")

@section("title", "MANUTENÇÃO DO AVIÁRIO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaManutencaoAviario@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Ocorrência
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Data Ocorrência</th>
                            <th>Data Resolução</th>
                            <th>Usuário Identificador</th>
                            <th>Usuário Resolutor</th>
                            <th>Ocorrência</th>
                            <th>Resolução</th>
                            <th>Resolver</th>
                            <th>Editar</th>
                            <th>Remover</th>
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

                                <td>{{$dataOcorrencia}} {{$horaOcorrencia}} h</td>

                                @if($dataResolução == "11/09/2001")
                                    <td>-</td>
                                @else
                                    <td>{{$dataResolução}} {{$horaResolução}}h</td>
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


                                @if($linha->resolvido==0)
                                    <td>
                                        <form action="{{action("ControlaManutencaoAviario@resolver", ["id" => $linha->id])}}"
                                              method="POST">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored"
                                                    style="width: 30px; height: 30px; min-width: initial; background-color: black">
                                                <i class="material-icons">done</i>
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                <td>
                                    <form action="{{action("ControlaManutencaoAviario@edit", ["id" => $linha->id])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        {{method_field('GET')}}
                                        <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored"
                                                style="width: 30px; height: 30px; min-width: initial; background-color: black">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{action("ControlaManutencaoAviario@destroy", ["id" => $linha->id])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored"
                                                style="width: 30px; height: 30px; min-width: initial; background-color: red">
                                            <i class="material-icons">clear</i>
                                        </button>
                                    </form>
                                </td>

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

    @include("_includes.dataTable")

@stop