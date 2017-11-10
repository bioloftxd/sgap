@extends("_layouts.principal")

@section("title", "REGISTRAR RESOLUÇÃO DE OCORRÊNCIA")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaManutencaoAviario@storeResolve',["id"=>$dados->id])}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Registrar Resolução de Ocorrência</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--7-col-tablet">
                        <label for="ocorrencia">Ocorrência:</label>
                        <p id="ocorrencia">{{$dados->ocorrencia}}</p>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" autofocus id="data_resolve" name="data_resolve"
                               value="{{date("Y-m-d")}}">
                        <label class=" mdl-textfield__label" for="data_resolve">Data Resolução</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_resolve" name="hora_resolve"
                               value="{{date("H:i")}}">
                        <label class=" mdl-textfield__label" for="hora_resolve">Hora Resolução</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--7-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="1" id="resolucao"
                                  name="resolucao">@isset($dados){{$dados->resolucao}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="resolucao">Resolução</label>
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