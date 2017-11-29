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
                            <th>Data Recebimento</th>
                            <th>Hora Recebimento</th>
                            <th>Data Saída</th>
                            <th>Hora Saída</th>
                            <th>Nº GTA</th>
                            <th>Nº NF</th>
                            <th>Total de Aves</th>
                            <th>Aves Mortas</th>
                            <th>Raça</th>
                            <th>Vacinas</th>
                            <th>Idade</th>
                            <th>Preço</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                            <th data-orderable="false">Editar</th>
                            <th data-orderable="false">Remover</th>
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

                                <td>{{$data_chegada}}</td>
                                <td>{{$hora_chegada}} h</td>
                                <td>{{$data_saida}}</td>
                                <td>{{$hora_saida}} h</td>
                                <td>{{$linha->numero_gta}}</td>
                                <td>{{$linha->numero_nf}}</td>
                                <td>{{$linha->quantidade_total}}</td>
                                <td>{{$linha->quantidade_morta}}</td>
                                <td>{{$linha->raca}}</td>
                                <td>{{$linha->vacinas}}</td>

                                @if ($linha->idade < 30)
                                    @php
                                        $dias = $linha->idade;
                                    @endphp
                                    <td>{{$dias}}d</td>
                                @elseif ($linha->idade > 30 && $linha->idade < 365)
                                    @php
                                        $meses = intdiv($linha->idade, 30);
                                        $dias = $linha->idade % 30;
                                    @endphp
                                    @if($dias ==0)
                                        <td>{{$meses}}m</td>
                                    @else
                                        <td>{{$dias}}d.{{$meses}}m</td>
                                    @endif
                                @else ($linha->idade > 365)
                                    @php
                                        $anos = intdiv($linha->idade, 365);
                                        $meses = ($linha->idade) - ($anos * 365);
                                        $meses = intdiv($meses, 30);
                                        $dias = $linha->idade % 365;
                                        $dias = $dias % 30;
                                    @endphp
                                    @if($dias ==0)
                                        <td>{{$meses}}m.{{$anos}}a</td>
                                    @else
                                        <td>{{$dias}}d.{{$meses}}m.{{$anos}}a</td>
                                    @endif
                                @endif

                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>
                                    <form action="{{action("ControlaAquisicao@edit", ["id" => $linha->id])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        {{method_field('GET')}}
                                        <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--raised">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{action("ControlaAquisicao@destroy", ["id" => $linha->id])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                            Remover
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