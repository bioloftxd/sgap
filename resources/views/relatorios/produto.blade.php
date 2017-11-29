@extends("_layouts.principal")

@section("title", "RELATÓRIO DE PRODUTOS")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Produtos</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Produtos</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell--11-col">

                    <form action="{{action("ControlaRelatorios@relatorioProduto")}}" method="POST">
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
                            <th>Marca</th>
                            <th>Tipo de Produto</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listaDados as $linha)
                            <tr>
                                <td>{{$linha->nome}}</td>
                                <td>{{$linha->marca}}</td>
                                <td>{{$linha->tipo_produto}}</td>
                                <td>{{$linha->observacoes}}</td>
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