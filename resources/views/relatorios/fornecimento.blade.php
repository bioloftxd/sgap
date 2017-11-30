@extends("_layouts.principal")

@section("title", "RELATÓRIO DE FORNECIMENTO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Fornecimento</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Fornecimento</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioFornecimento")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_inicial" id="data_inicial">
                                <option selected disabled value="null">Data Inicial</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_fornecimento);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_fornecimento}}">{{$data}}</option>
                                @endforeach
                            </select>

                            <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                                    name="data_final" id="data_final">
                                <option selected disabled value="null">Data Final</option>
                                @foreach($listaDatas as $linha)
                                    @php
                                        $data = DateTime::createFromFormat('Y-m-d', $linha->data_fornecimento);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    <option value="{{$linha->data_fornecimento}}">{{$data}}</option>
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
                            <th>Data Fornecimento</th>
                            <th>Fornecedor</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Fabricação</th>
                            <th>Validade</th>
                            <th>Nº NF</th>
                            <th>Lote</th>
                            <th>Responsável</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $quantidade =0;
                            $valorTota =0;
                        @endphp
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
                                <td>{{$linha->fornecedor->nome}}</td>
                                <td>{{$linha->produto->nome}}</td>
                                <td>{{$linha->quantidade}}</td>
                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$dataFab}}</td>
                                <td>{{$dataVal}}</td>
                                <td>{{$linha->numero_nf}}</td>
                                <td>{{$linha->lote}}</td>
                                <td>{{$linha->usuario->nome}}</td>
                            </tr>
                            @php
                                $quantidade +=$linha->quantidade;
                                $valorTota +=$linha->preco;
                            @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td><b>Registros</b></td>
                        <td><b>{{sizeof($listaDados)}}</b></td>
                        <td><b>Quantidade</b></td>
                        <td><b>{{number_format($quantidade,2,',','')}}</b></td>
                        <td><b>Valor Total</b></td>
                        <td><b>R${{number_format($valorTota,2,',','')}}</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                        <td><b></b></td>
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