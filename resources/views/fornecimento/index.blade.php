@extends("_layouts.principal")

@section("title", "FORNECIMENTO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <a href="{{action("ControlaFornecimento@create")}}"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                    Registrar Fornecimento
                </a>

                <div class="mdl-layout-spacer"></div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Data Fornecimento</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Fornecedor</th>
                            <th>Preço</th>
                            <th>Fabricação</th>
                            <th>Validade</th>
                            <th>Nº NF</th>
                            <th>Lote</th>
                            <th>Responsável</th>
                            <th>Observações</th>
                            <th data-orderable="false">Editar</th>
                            <th data-orderable="false">Remover</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listaDados as $linha)
                            @php
                                $dataFab = DateTime::createFromFormat('Y-m-d', $linha->data_fabricacao);
                                $dataFab= date_format($dataFab, 'd/m/Y');
                                $dataVal = DateTime::createFromFormat('Y-m-d', $linha->data_validade);
                                $dataVal= date_format($dataVal, 'd/m/Y');
                                $dataForn = DateTime::createFromFormat('Y-m-d', $linha->data_fornecimento);
                                $dataForn= date_format($dataForn, 'd/m/Y');
                            @endphp

                            <tr>
                                <td>{{$dataForn}}</td>
                                <td>{{$linha->produto->nome}}</td>
                                <td>{{$linha->quantidade}}</td>
                                <td>{{$linha->fornecedor->nome}}</td>
                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$dataFab}}</td>
                                <td>{{$dataVal}}</td>
                                <td>{{$linha->numero_nf}}</td>
                                <td>{{$linha->lote}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                                <td>{{$linha->observacoes}}</td>
                                <td>
                                    <form action="{{action("ControlaFornecimento@edit", ["id" => $linha->id])}}"
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
                                    <form action="{{action("ControlaFornecimento@destroy", ["id" => $linha->id])}}"
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