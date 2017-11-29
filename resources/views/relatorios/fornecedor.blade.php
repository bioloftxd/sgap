@extends("_layouts.principal")

@section("title", "RELATÓRIO DE FORNECEDORES")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Fornecedores</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Fornecedores</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <div class="mdl-grid">

                <div class="mdl-layout-spacer"></div>

                <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                    <table id="tabela" class="display">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF/CNPJ</th>
                            <th>Endereco</th>
                            <th>Telefone</th>
                            <th>Observações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listaDados as $linha)
                            <tr>
                                <td>{{$linha->nome}}</td>
                                <td>{{$linha->cpf_cnpj}}</td>
                                <td>{{$linha->endereco}}</td>
                                <td>{{$linha->telefone}}</td>
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