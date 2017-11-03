@extends("_layouts.principal")

@section("title", "REGISTRAR OCORRÊNCIA")

@section("content")

    @php
        date_default_timezone_set("America/Campo_Grande");
    @endphp

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaManutencaoAviario@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Registrar Ocorrência</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--4-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="numero_relatorio" name="numero_relatorio"
                               @isset($dados)value="{{$dados->numero_relatorio}}"@endisset>
                        <label class="mdl-textfield__label" for="numero_relatorio">Nº Relatório</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_verifica" name="data_verifica"
                               @isset($dados)value="{{$dados->data_verifica}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}" @endempty>
                        <label class=" mdl-textfield__label" for="data_verifica">Data Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_verifica" name="hora_verifica"
                               @isset($dados)value="{{$dados->hora_verifica}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_verifica">Hora Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="ocorrencia"
                                  name="ocorrencia">@isset($dados){{$dados->ocorrencia}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="ocorrencia">Descrição da Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--5-col-tablet">
                        Registrar
                    </button>

                    <div class="mdl-layout-spacer"></div>

                    <a href="{{action("ControlaManutencaoAviario@index")}}"
                       class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                       style="background-color: red">
                        Cancelar
                    </a>

                    <div class="mdl-layout-spacer"></div>
                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop