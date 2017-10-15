@extends("_layouts.principal")

@section("title", "COLETA DE EXCREMENTO")

@section("content")

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaColetaExcremento@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Coleta
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Litros</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listaColetas as $linha)
                            <tr>

                                @php
                                    $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                    $data = date_format($data, 'd/m/Y');
                                    $hora = DateTime::createFromFormat('H:i:s', $linha->hora);
                                    $hora = date_format($hora, 'H:i');
                                @endphp

                                <td>{{$linha->id}}</td>
                                <td>{{$data}}</td>
                                <td>{{$hora}}h</td>
                                <td>{{$linha->litros}}</td>
                                <td>{{$linha->id_usuario}}</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>
                                    <form action="{{action("ControlaColetaExcremento@edit", ["id" => $linha->id])}}"
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
                                    <form action="{{action("ControlaColetaExcremento@destroy", ["id" => $linha->id])}}"
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