@extends("_layouts.principal")

@section("title", "RELATÓRIO DE ESTOQUE")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Estoque</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Estoque</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioEstoque")}}" method="POST">
                        {{csrf_field()}}

                        <div class="mdl-grid">

                            <div class="mdl-layout-spacer"></div>

                            <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet"
                                    name="tipo_produto" id="tipo_produto">
                                <option disabled selected value="null">Tipo de Produto</option>
                                <option value="">Todos</option>
                                <option value="Embalagem"
                                        @isset($dados)@if($dados->tipo_produto == "Embalagem") selected @endif @endisset>
                                    Embalagem
                                </option>
                                <option value="Medicamento"
                                        @isset($dados)@if($dados->tipo_produto == "Medicamento") selected @endif @endisset>
                                    Medicamento
                                </option>
                                <option value="Ração"
                                        @isset($dados)@if($dados->tipo_produto == "Ração") selected @endif @endisset>
                                    Ração
                                </option>
                                <option value="Vacina"
                                        @isset($dados)@if($dados->tipo_produto == "Vacina") selected @endif @endisset>
                                    Vacina
                                </option>
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
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Tipo Produto</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $valorTotal=0;
                        @endphp
                        @foreach($listaDados as $linha)
                            <tr>
                                <td>{{$linha->produto->nome}}</td>
                                <td>{{$linha->quantidade}}</td>
                                <td>R${{number_format($linha->preco,2,',','')}}</td>
                                <td>{{$linha->produto->tipo_produto}}</td>
                                <td>{{$linha->produto->observacoes}}</td>
                            </tr>
                        @php
                            $valorTotal+=$linha->preco;
                        @endphp
                        @endforeach
                        <tbody>
                        <td><b>Registros</b></td>
                        <td><b>{{sizeof($listaDados)}}</b></td>
                        <td><b>Valor Total</b></td>
                        <td><b>R${{number_format($valorTotal,2,',','')}}</b></td>
                        <td><b></b></td>
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