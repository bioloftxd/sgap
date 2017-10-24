@extends("_layouts.principal")

@section("title", "EDITAR OCORRÊNCIA")

@section("content")

    @php
        date_default_timezone_set("America/Campo_Grande");
    @endphp

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaManutencaoAviario@update',["id"=>$manutencao->id])}}">
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
                        <input class="mdl-textfield__input" type="number" id="numeroRelatorio" name="numeroRelatorio"
                               value="{{$manutencao->numero_relatorio}}">
                        <label class="mdl-textfield__label" for="numeroRelatorio">Nº Relatório</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="dataOcorrencia" name="dataOcorrencia"
                               value="{{$manutencao->data_verifica}}">
                        <label class=" mdl-textfield__label" for="dataOcorrencia">Data Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="horaOcorrencia" name="horaOcorrencia"
                               value="{{$manutencao->hora_verifica}}">
                        <label class="mdl-textfield__label" for="horaOcorrencia">Hora Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="dataResolve" name="dataResolve"
                               value="{{$manutencao->data_resolve}}">
                        <label class=" mdl-textfield__label" for="dataResolve">Data Resolução</label>
                    </div>

                    <div class="mdl-layout-spacer mdl-layout--small-screen-only"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="horaResolve" name="horaResolve"
                               value="{{$manutencao->hora_resolve}}">
                        <label class="mdl-textfield__label" for="horaResolve">Hora Resolução</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" id="ocorrencia"
                                  name="ocorrencia">{{$manutencao->ocorrencia}}</textarea>
                        <label class="mdl-textfield__label" for="ocorrencia">Descrição da Ocorrência</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--8-col-desktop">
                        <textarea class="mdl-textfield__input" type="text" id="resolucao"
                                  name="resolucao">{{$manutencao->resolucao}}</textarea>
                        <label class="mdl-textfield__label" for="resolucao">Descrição da Resolução</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop">
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
                                               value="1"@if($manutencao->resolvido==1) @php echo "checked" @endphp @endif>
                                        <span class="mdl-radio__label">Resolvido</span>
                                    </label>
                                </td>
                                <td>
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                           for="naoResolvido">
                                        <input type="radio" id="naoResolvido" name="resolvido"
                                               class="mdl-radio__button"
                                               value="0" @if($manutencao->resolvido==0) @php echo "checked" @endphp @endif>
                                        <span class="mdl-radio__label">Não Resolvido</span>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">


                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="numer" id="usuarioVerifica" name="usuarioVerifica"
                               value="{{$manutencao->id_usuario_verifica}}">
                        <label class="mdl-textfield__label"
                               for="usuarioVerifica">Usuário que Verificou Ocorrência</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet">
                        <input class="mdl-textfield__input" type="numer" id="usuarioResolve" name="usuarioResolve"
                               value="{{$manutencao->id_usuario_resolve}}">
                        <label class="mdl-textfield__label"
                               for="usuarioVerifica">Usuário que Resolucionou Ocorrência</label>
                    </div>

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