@extends("_layouts.principal")

@section("title", "VENTILAÇÃO DO AVIÁRIO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaVentilacao@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Ventilação
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">

                        <thead>

                        <tr>
                            <th>Data/Hora Abertura</th>
                            <th>Data/Hora Fechamento</th>
                            <th>Temperatura Mínima</th>
                            <th>Temperatura Média</th>
                            <th>Temperatura Máxima</th>
                            <th>Observações</th>
                            <th>Responsável</th>
                            <th>Editar</th>
                            <th>Remover</th>
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

                                <td>{{$data_abertura}} {{$hora_abertura}}h</td>
                                <td>{{$data_fechamento}} {{$hora_fechamento}}h</td>
                                <td>{{number_format($linha->temperatura_minima,1,',','')}} Cº</td>
                                <td>{{number_format($temperatura_media,1,',','')}} Cº</td>
                                <td>{{number_format($linha->temperatura_maxima,1,',','')}} Cº</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>{{$linha->usuario->nome}}</td>


                                <td>
                                    <form action="{{action("ControlaVentilacao@edit", ["id" => $linha->id])}}"
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
                                    <form action="{{action("ControlaVentilacao@destroy", ["id" => $linha->id])}}"
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