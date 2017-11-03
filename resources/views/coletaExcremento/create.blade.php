@extends("_layouts.principal")

@section("title", "REGISTRAR COLETA DE EXCREMENTO")

@section("content")

    @php
        date_default_timezone_set("America/Campo_Grande");
    @endphp

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaColetaExcremento@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Registrar Coleta de Excremento</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--1-col-phone mdl-cell--1-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="litros" name="litros"
                               @isset($dados)value="{{$dados->litros}}" @endisset
                               @empty($dados)value="1" @endempty
                               step="0.01">
                        <label class="mdl-textfield__label" for="hora">Litros</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data" name="data"
                               @isset($dados)value="{{$dados->data}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}" @endempty>
                        <label class=" mdl-textfield__label" for="data">Data</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--1-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora" name="hora"
                               @isset($dados) value="{{$dados->hora}}" @endisset
                               @empty($dados) value="{{date("H:i")}}" @endempty>
                        <label class="mdl-textfield__label" for="hora">Hora</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">@isset($dados){{$dados->observacoes}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
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

                    <a href="{{action("ControlaColetaExcremento@index")}}"
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