@extends("_layouts.principal")

@section("title", "EDITAR ALIMENTAÇÃO DAS AVES")

@section("content")

    @php
        date_default_timezone_set("America/Campo_Grande");
    @endphp

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid" xmlns="http://www.w3.org/1999/html">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaAlimentacao@update',["id"=>$dados->id])}}">
                {{method_field("PUT")}}
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Editar Alimentação das Aves</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h4>Editar Alimentação das Aves</h4>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data" name="data"
                               value="{{$dados->data}}">
                        <label class=" mdl-textfield__label" for="data">Data</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora" name="hora"
                               value="{{$dados->hora}}">
                        <label class="mdl-textfield__label" for="hora">Hora</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade_alimento"
                               name="quantidade_alimento"
                               value="{{$dados->quantidade_alimento}}">
                        <label class="mdl-textfield__label" for="quantidade_alimento">Quatidade alimento (Kg)</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                            name="id_tipo_racao" id="id_tipo_racao">
                        @foreach($listaDados as $linha)
                            @if($linha->id == $dados->id_tipo_racao)
                                <option value="{{$linha->id}}" selected>{{$linha->tipo}}</option>
                            @else
                                <option value="{{$linha->id}}">{{$linha->tipo}}</option>
                            @endif
                        @endforeach
                    </select>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">{{$dados->observacoes}}</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--5-col-tablet">
                        Editar
                    </button>

                    <div class="mdl-layout-spacer"></div>

                    <a href="{{action("ControlaAlimentacao@index")}}"
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