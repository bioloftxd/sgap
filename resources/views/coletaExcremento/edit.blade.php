@extends("_layouts.principal")

@section("title", "EDITAR COLETA DE EXCREMENTO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaColetaExcremento@update',["id"=>$coleta->id])}}">
                {{csrf_field()}}
                {{method_field("PUT")}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Editar Coleta de Excremento</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--1-col-phone mdl-cell--1-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="litros" name="litros"
                               value="{{$coleta->litros}}" step="0.01">
                        <label class="mdl-textfield__label" for="hora">Litros</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data" name="data" value="{{$coleta->data}}">
                        <label class=" mdl-textfield__label" for="data">Data</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--1-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora" name="hora" value="{{$coleta->hora}}">
                        <label class="mdl-textfield__label" for="hora">Hora</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">{{$coleta->observacoes}}</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                            style="background-color: black">
                        Editar
                    </button>

                    <div class="mdl-layout-spacer"></div>

                    <a href="{{action("ControlaColetaExcremento@index")}}"
                       class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                       style="background-color: red">
                        Cancelar
                    </a>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-layout-spacer"></div>
                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop