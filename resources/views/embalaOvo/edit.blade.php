@extends("_layouts.principal")

@section("title", "EDITAR EMBALAGEM DE OVOs")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaEmbalaOvo@update',["id"=>$dados->id])}}">
                {{method_field("PUT")}}
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Editar Embalagem de Ovos</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h5>Editar Embalagem de Ovos</h5>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data" autofocus name="data"
                               @isset($dados)value="{{$dados->data}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty >
                        <label class=" mdl-textfield__label" for="data">Data da Embalagem</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora" name="hora"
                               @isset($dados)value="{{$dados->hora}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora">Hora da Embalagem</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="lote" name="lote"
                               @isset($dados)value="{{$dados->lote}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="lote">Lote da Embalagem</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="quantidade_embalada" id="quantidade_embalada"
                               name="quantidade_embalada"
                               @isset($dados)value="{{$dados->quantidade_embalada}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="quantidade_embalada">Total de Embalagens</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
                            name="tipo_embalagem" id="tipo_embalagem">
                        <option selected disabled value="null">Tipo de Embalagem</option>
                        <option value="12 Unidades"
                                @isset($dados) @if($dados->tipo_embalagem == "12 Unidades") selected @endif @endisset>12
                            Unidades
                        </option>
                        <option value="30 Unidades"
                                @isset($dados) @if($dados->tipo_embalagem == "30 Unidades") selected @endif @endisset>
                            30 Unidades
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

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
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

                    <a href="{{action("ControlaEmbalaOvo@index")}}"
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