@extends("_layouts.principal")

@section("title", "EDITAR ALIMENTAÇÃO DAS AVES")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

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
                        <h5>Editar Alimentação das Aves</h5>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="date" autofocus id="data" name="data"
                               value="{{$dados->data}}">
                        <label class=" mdl-textfield__label" for="data">Data</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--1-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora" name="hora"
                               value="{{$dados->hora}}">
                        <label class="mdl-textfield__label" for="hora">Hora</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" step="0.01" id="quantidade_alimento"
                               name="quantidade_alimento"
                               value="{{$dados->quantidade_alimento}}">
                        <label class="mdl-textfield__label" for="quantidade_alimento">Quatidade alimento (Kg)</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                            name="tipo_racao" id="tipo_racao">
                        <option disabled selected value="null">Tipo de Ração</option>
                        <option value="Inicial"
                                @isset($dados)@if($dados->tipo_racao == "Inicial") selected @endif @endisset>Inicial
                        </option>
                        <option value="Engorda"
                                @isset($dados)@if($dados->tipo_racao == "Engorda") selected @endif @endisset>Engorda
                        </option>
                        <option value="Experimental"
                                @isset($dados)@if($dados->tipo_racao == "Experimental") selected @endif @endisset>
                            Experimental
                        </option>
                        <option value="Postura"
                                @isset($dados)@if($dados->tipo_racao == "Postura") selected @endif @endisset>
                            Postura
                        </option>
                        <option value="Recria"
                                @isset($dados)@if($dados->tipo_racao == "Recria") selected @endif @endisset>
                            Recria
                        </option>
                    </select>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--8-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">@isset($dados){{$dados->observacoes}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
                            name="id_usuario" id="id_usuario">
                        <option selected disabled value="null">Usuário Responsável</option>
                        @foreach($listaDados as $linha)
                            @if($linha->id == $dados->id_usuario)
                                <option value="{{$linha->id}}" selected>{{$linha->nome}}</option>
                            @else
                                <option value="{{$linha->id}}">{{$linha->nome}}</option>
                            @endif
                        @endforeach
                    </select>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        Salvar
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