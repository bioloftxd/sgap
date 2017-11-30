@extends("_layouts.principal")

@section("title", "RELATÓRIO DE GAIOLAS")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
            <h5>Relatório de Gaiolas</h5>
        </div>
        <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
            <h4>Relatório de Gaiolas</h4>
        </div>

        <div class="mdl-layout-spacer"></div>
    </div>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-grid">

            <div class="mdl-layout-spacer"></div>

            <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet table-responsive">

                <table id="tabela" class="display">
                    <thead>
                    <tr>
                        <th>Nº Gaiola</th>
                        <th>Nº de Aves</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $aves =0;
                    @endphp
                    @foreach($listaDados as $linha)
                        <tr>
                            <td>{{$linha->numero_gaiola}}</td>
                            <td>{{$linha->quantidade_aves}}</td>
                        </tr>
                        @php
                            $aves += $linha->quantidade_aves;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                    <td><b>Registros  {{sizeof($listaDados)}}</b></td>
                    <td><b>Tota de Aves  {{$aves}}</b></td>
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