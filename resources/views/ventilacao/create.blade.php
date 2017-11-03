@extends("_layouts.principal")

@section("title", "REGISTRAR VENTILAÇÃO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaVentilacao@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Registrar Ventilação</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_abertura" name="data_abertura"
                               @isset($dados)value="{{$dados->data_abertura}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty>
                        <label class=" mdl-textfield__label" for="data_abertura">Data Abertura</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_abertura" name="hora_abertura"
                               @isset($dados)value="{{$dados->hora_abertura}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_abertura">Hora Abertura</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_fechamento" name="data_fechamento"
                               @isset($dados)value="{{$dados->data_fechamento}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty>
                        <label class=" mdl-textfield__label" for="data_fechamento">Data Fechamento</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_fechamento" name="hora_fechamento"
                               @isset($dados)value="{{$dados->hora_fechamento}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_fechamento">Hora Fechamento</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="temperatura_minima"
                               name="temperatura_minima" step="0.01"
                               value="@isset($dados){{$dados->temperatura_minima}}@endisset">
                        <label class="mdl-textfield__label" for="temperatura_minima">Temperatura Mínima Cº</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="temperatura_maxima"
                               name="temperatura_maxima" step="0.01"
                               value="@isset($dados){{$dados->temperatura_maxima}}@endisset">
                        <label class="mdl-textfield__label" for="temperatura_maxima">Temperatura Máxima Cº</label>
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

                    <a href="{{action("ControlaVentilacao@index")}}"
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