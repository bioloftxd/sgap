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
                               value="@php echo(isset($ventilacao->data_abertura))?$ventilacao->data_abertura:date("Y-m-d")@endphp">
                        <label class=" mdl-textfield__label" for="data_abertura">Data Abertura</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--1-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_abertura" name="hora_abertura"
                               value="@php echo(isset($ventilacao->hora_abertura))?$ventilacao->hora_abertura:date("H:i")@endphp">
                        <label class="mdl-textfield__label" for="hora_abertura">Hora Abertura</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--large-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_fechamento" name="data_fechamento"
                               value="@php echo(isset($ventilacao->data_fechamento))?$ventilacao->data_fechamento:date("Y-m-d")@endphp">
                        <label class=" mdl-textfield__label" for="data_fechamento">Data Fechamento</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--1-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_fechamento" name="hora_fechamento"
                               value="@php echo(isset($ventilacao->hora_fechamento))?$ventilacao->hora_fechamento:date("H:i")@endphp">
                        <label class="mdl-textfield__label" for="hora_fechamento">Hora Fechamento</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="temperatura_minima"
                               name="temperatura_minima" step="0.01"
                               value="@isset($ventilacao->temperatura_minima){{$ventilacao->temperatura_minima}}@endisset">
                        <label class="mdl-textfield__label" for="temperatura_minima">Temperatura Mínima Cº</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="temperatura_maxima"
                               name="temperatura_maxima" step="0.01"
                               value="@isset($ventilacao->temperatura_maxima){{$ventilacao->temperatura_maxima}}@endisset">
                        <label class="mdl-textfield__label" for="temperatura_maxima">Temperatura Máxima Cº</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">@isset($ventilacao->observacoes){{$ventilacao->observacoes}}@endisset</textarea>
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