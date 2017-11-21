@extends("_layouts.principal")

@section("title", "AQUISIÇÃO DE AVES")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaAquisicao@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Aquisição
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Data/Hora Chegada</th>
                            <th>Data/Hora Saida</th>
                            <th>Quantidade</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listaDados as $linha)
                            <tr>

                                @php
                                    $data_chegada = DateTime::createFromFormat('Y-m-d', $linha->data_chegada);
                                    $data_chegada = date_format($data_chegada, 'd/m/Y');
                                    $hora_chegada = DateTime::createFromFormat('H:i:s', $linha->hora_chegada);
                                    $hora_chegada = date_format($hora_chegada, 'H:i');
                                    $data_saida = DateTime::createFromFormat('Y-m-d', $linha->data_saida);
                                    $data_saida = date_format($data_saida, 'd/m/Y');
                                    $hora_saida = DateTime::createFromFormat('H:i:s', $linha->hora_saida);
                                    $hora_saida = date_format($hora_saida, 'H:i');
                                @endphp

                                <td>{{$data_chegada}} {{$hora_chegada}} h</td>
                                <td>{{$data_saida}} {{$hora_saida}} h</td>
                                <td>{{$linha->quantidade_total - $linha->quantidade_morta}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>
                                    <form action="{{action("ControlaAquisicao@edit", ["id" => $linha->id])}}"
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
                                    <form action="{{action("ControlaAquisicao@destroy", ["id" => $linha->id])}}"
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