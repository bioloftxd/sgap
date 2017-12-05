@extends("_layouts.principal")

@section("title", "EDITAR OCORRÊNCIA")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaManutencaoAviario@update',["id"=>$dados->id])}}">
                {{csrf_field()}}
                {{method_field("PUT")}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Editar Ocorrência</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="numero_relatorio" autofocus
                               name="numero_relatorio"
                               value="{{$dados->numero_relatorio}}">
                        <label class="mdl-textfield__label" for="numero_relatorio">Nº Relatório</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_verifica" name="data_verifica"
                               value="{{$dados->data_verifica}}">
                        <label class=" mdl-textfield__label" for="data_verifica">Data Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_verifica" name="hora_verifica"
                               value="{{$dados->hora_verifica}}">
                        <label class="mdl-textfield__label" for="hora_verifica">Hora Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_resolve" name="data_resolve"
                               value="{{$dados->data_resolve}}">
                        <label class=" mdl-textfield__label" for="data_resolve">Data Resolução</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_resolve" name="hora_resolve"
                               value="{{$dados->hora_resolve}}">
                        <label class="mdl-textfield__label" for="hora_resolve">Hora Resolução</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" id="ocorrencia"
                                  name="ocorrencia">{{$dados->ocorrencia}}</textarea>
                        <label class="mdl-textfield__label" for="ocorrencia">Descrição da Ocorrência</label>
                    </div>

                    <div class="mdl-cell mdl-cell--1-col-desktop mdl-cell--1-col-tablet"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" id="resolucao"
                                  name="resolucao">{{$dados->resolucao}}</textarea>
                        <label class="mdl-textfield__label" for="resolucao">Descrição da Resolução</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop">
                        <table>
                            <tr>
                                <td>Status</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                           for="resolvido">
                                        <input type="radio" id="resolvido" name="resolvido"
                                               class="mdl-radio__button"
                                               value="1" @if($dados->resolvido==1) checked @endif>
                                        <span class="mdl-radio__label">Resolvido</span>
                                    </label>
                                </td>
                                <td>
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                           for="naoResolvido">
                                        <input type="radio" id="naoResolvido" name="resolvido"
                                               class="mdl-radio__button"
                                               value="0" @if($dados->resolvido==0)checked @endif>
                                        <span class="mdl-radio__label">Não Resolvido</span>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="mdl-cell--2-col-tablet"></div>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet"
                            name="id_usuario_verifica" id="id_usuario_verifica">
                        <option selected disabled value="null">Usuário que Verificou Ocorrência</option>
                        @foreach($listaDados as $linha)
                            @if($linha->id == $dados->id_usuario_verifica)
                                <option value="{{$linha->id}}" selected>{{$linha->nome}}</option>
                            @else
                                <option value="{{$linha->id}}">{{$linha->nome}}</option>
                            @endif
                        @endforeach
                    </select>

                    <div class="mdl-cell--1-col-tablet"></div>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet"
                            name="id_usuario_resolve" id="id_usuario_resolve">
                        <option selected disabled value="null">Usuário que Resolucionou Ocorrência</option>
                        @foreach($listaDados as $linha)
                            @if($linha->id == $dados->id_usuario_resolve)
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
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--5-col-tablet">
                        Salvar
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