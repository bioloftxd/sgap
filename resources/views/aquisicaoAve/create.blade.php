@extends("_layouts.principal")

@section("title", "REGISTRAR AQUISICAO DE AVES")

@section("content")


    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaAquisicao@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Registrar Aquisição de Aves</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h4>Registrar Aquisição de Aves</h4>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_chegada" autofocus name="data_chegada"
                               @isset($dados)value="{{$dados->data_chegada}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty >
                        <label class=" mdl-textfield__label" for="data_chegada">Data de chegada</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_chegada" name="hora_chegada"
                               @isset($dados)value="{{$dados->hora_chegada}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_chegada">Hora de chegada</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_saida" name="data_saida"
                               @isset($dados)value="{{$dados->data_saida}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty >
                        <label class=" mdl-textfield__label" for="data_saida">Data de saída</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_saida" name="hora_saida"
                               @isset($dados)value="{{$dados->hora_saida}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_saida">Hora de saída</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="numero_gta"
                               name="numero_gta"
                               @isset($dados)value="{{$dados->numero_gta}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="numero_gta">Número G.T.A.</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="numero_nf"
                               name="numero_nf"
                               @isset($dados)value="{{$dados->numero_nf}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="numero_nf">Número N.F.</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade_total"
                               name="quantidade_total"
                               @isset($dados)value="{{$dados->quantidade_total}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="quantidade_total">Total de aves</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade_morta"
                               name="quantidade_morta"
                               @isset($dados)value="{{$dados->quantidade_morta}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="quantidade_morta">Aves mortas</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="idade"
                               name="idade"
                               @isset($dados)value="{{$dados->idade}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="idade">Idade do Lote</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="preco" name="preco"
                               @isset($dados)value="{{$dados->preco}}" @endisset
                               @empty($dados)value="" @endempty
                               step="0.01">
                        <label class="mdl-textfield__label" for="preco">Preço (R$)</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
                            name="raca" id="raca">
                        <option selected disabled value="null">Raça do lote</option>
                        <option value="Embrapa 051">Embrapa 051</option>
                        <option value="Gigante Negra De Jersey">Gigante Negra De Jersey</option>
                        <option value="Rhode Island Red">Rhode Island Red</option>
                        <option value="Plymouth Rock Barrada">Plymouth Rock Barrada</option>
                        <option value="Caipira De Pescoço Pelado">Caipira De Pescoço Pelado</option>
                        <option value="Orpington">Orpington</option>
                        <option value="Caipira Comum">Caipira Comum</option>
                        <option value="Shamo">Shamo</option>
                        <option value="Embrapa 041">Embrapa 041</option>
                        <option value="Garnizés">Garnizés</option>
                        <option value="Índio Gigante">Índio Gigante</option>
                    </select>


                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet">
                        <table>
                            <tr>
                                <td>Vacinas</td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Anemia Infecciosa">
                                        <input type="checkbox" name="vacinas[]" value="Anemia Infecciosa"
                                               id="Anemia Infecciosa"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Anemia Infecciosa</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Bronquite Infecciosa">
                                        <input type="checkbox" name="vacinas[]" value="Bronquite Infecciosa"
                                               id="Bronquite Infecciosa"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Bronquite Infecciosa</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Coccidiose">
                                        <input type="checkbox" name="vacinas[]" value="Coccidiose"
                                               id="Coccidiose"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Coccidiose</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Coriza">
                                        <input type="checkbox" name="vacinas[]" value="Coriza"
                                               id="Coriza"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Coriza</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Gumboro">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Gumboro"
                                               id="Doença de Gumboro"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Doença de Gumboro</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Marek">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Marek"
                                               id="Doença de Marek"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Doença de Marek</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Newcastle">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Newcastle"
                                               id="Doença de Newcastle "
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Doença de Newcastle</span>
                                    </label>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet">
                        <table>

                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Encefalomielite">
                                        <input type="checkbox" name="vacinas[]" value="Encefalomielite"
                                               id="Encefalomielite "
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Encefalomielite</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Epitelioma (Bouba)">
                                        <input type="checkbox" name="vacinas[]" value="Epitelioma (Bouba)"
                                               id="Epitelioma (Bouba) "
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Epitelioma (Bouba)</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Pneumovírus">
                                        <input type="checkbox" name="vacinas[]" value="Pneumovírus"
                                               id="Pneumovírus"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Pneumovírus</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Reovírus">
                                        <input type="checkbox" name="vacinas[]" value="Reovírus"
                                               id="Reovírus"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Reovírus</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Salmonela enteritidis">
                                        <input type="checkbox" name="vacinas[]" value="Salmonela enteritidis"
                                               id="Salmonela enteritidis"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Salmonela enteritidis</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Salmonela gallinarum">
                                        <input type="checkbox" name="vacinas[]" value="Salmonela gallinarum"
                                               id="Salmonela gallinarum"
                                               class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label">Salmonela gallinarum</span>
                                    </label>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--11-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">@isset($dados){{$dados->observacoes}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet">
                        Registrar
                    </button>

                    <div class="mdl-layout-spacer"></div>

                    <a href="{{action("ControlaAquisicao@index")}}"
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