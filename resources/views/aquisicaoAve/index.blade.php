@extends("_layouts.principal")

@section("title", "ALIMENTAÇÃO DAS AVES")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaAlimentacao@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Alimentação
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Data/Hora</th>
                            <th>Gaiola</th>
                            <th>Quantidade Ração</th>
                            <th>Tipo Ração</th>
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
                                    $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                    $data = date_format($data, 'd/m/Y');
                                    $hora = DateTime::createFromFormat('H:i:s', $linha->hora);
                                    $hora = date_format($hora, 'H:i');
                                @endphp

                                <td>{{$data}} {{$hora}} h</td>
                                <td>Tenho que pensar...</td>
                                <td>{{number_format($linha->quantidade_alimento,1,',','')}} L</td>
                                <td>{{$linha->tipo_racao->tipo}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>
                                    <form action="{{action("ControlaAlimentacao@edit", ["id" => $linha->id])}}"
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
                                    <form action="{{action("ControlaAlimentacao@destroy", ["id" => $linha->id])}}"
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