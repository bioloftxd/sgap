@extends("_layouts.principal")

@section("title", "REGISTRAR AQUISICAO DE AVES")

@section("content")

    @isset($dados)
        @php
            if ($dados->idade < 30) {
                $dias = $dados->idade;
            } elseif ($dados->idade > 30 && $dados->idade < 365) {
                $meses = intdiv($dados->idade, 30);
                $dias = $dados->idade % 30;
            } elseif ($dados->idade > 365) {
                $anos = intdiv($dados->idade, 365);
                $meses = ($dados->idade) - ($anos * 365);
                $meses = intdiv($meses, 30);
                $dias = $dados->idade % 365;
                $dias = $dias % 30;
            }
        $vacinas = explode(", ", $dados->vacinas);
        @endphp
    @endisset


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
                        <input class="mdl-textfield__input" type="number" id="preco" name="preco"
                               @isset($dados)value="{{$dados->preco}}" @endisset
                               @empty($dados)value="" @endempty
                               step="0.01">
                        <label class="mdl-textfield__label" for="preco">Valor Total (R$)</label>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet">
                        <table>
                            <tr>
                                <td>Idade do Lote</td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="dias" id="dias">
                                        <option selected disabled value="null">Dias</option>
                                        <option value="0">0</option>
                                        <option value="1" @isset($dias)@if($dias==1)selected @endif @endisset>1</option>
                                        <option value="2" @isset($dias)@if($dias==2)selected @endif @endisset>2</option>
                                        <option value="3" @isset($dias)@if($dias==3)selected @endif @endisset>3</option>
                                        <option value="4" @isset($dias)@if($dias==4)selected @endif @endisset>4</option>
                                        <option value="5" @isset($dias)@if($dias==5)selected @endif @endisset>5</option>
                                        <option value="6" @isset($dias)@if($dias==6)selected @endif @endisset>6</option>
                                        <option value="7" @isset($dias)@if($dias==7)selected @endif @endisset>7</option>
                                        <option value="8" @isset($dias)@if($dias==8)selected @endif @endisset>8</option>
                                        <option value="9" @isset($dias)@if($dias==9)selected @endif @endisset>9</option>
                                        <option value="10" @isset($dias)@if($dias==10)selected @endif @endisset>10
                                        </option>
                                        <option value="11" @isset($dias)@if($dias==11)selected @endif @endisset>11
                                        </option>
                                        <option value="12" @isset($dias)@if($dias==12)selected @endif @endisset>12
                                        </option>
                                        <option value="13" @isset($dias)@if($dias==13)selected @endif @endisset>13
                                        </option>
                                        <option value="14" @isset($dias)@if($dias==14)selected @endif @endisset>14
                                        </option>
                                        <option value="15" @isset($dias)@if($dias==15)selected @endif @endisset>15
                                        </option>
                                        <option value="16" @isset($dias)@if($dias==16)selected @endif @endisset>16
                                        </option>
                                        <option value="17" @isset($dias)@if($dias==17)selected @endif @endisset>17
                                        </option>
                                        <option value="18" @isset($dias)@if($dias==18)selected @endif @endisset>18
                                        </option>
                                        <option value="19" @isset($dias)@if($dias==19)selected @endif @endisset>19
                                        </option>
                                        <option value="20" @isset($dias)@if($dias==20)selected @endif @endisset>20
                                        </option>
                                        <option value="21" @isset($dias)@if($dias==21)selected @endif @endisset>21
                                        </option>
                                        <option value="22" @isset($dias)@if($dias==22)selected @endif @endisset>22
                                        </option>
                                        <option value="23" @isset($dias)@if($dias==23)selected @endif @endisset>23
                                        </option>
                                        <option value="24" @isset($dias)@if($dias==24)selected @endif @endisset>24
                                        </option>
                                        <option value="25" @isset($dias)@if($dias==25)selected @endif @endisset>25
                                        </option>
                                        <option value="26" @isset($dias)@if($dias==26)selected @endif @endisset>26
                                        </option>
                                        <option value="27" @isset($dias)@if($dias==27)selected @endif @endisset>27
                                        </option>
                                        <option value="28" @isset($dias)@if($dias==28)selected @endif @endisset>28
                                        </option>
                                        <option value="29" @isset($dias)@if($dias==29)selected @endif @endisset>29
                                        </option>
                                        <option value="30" @isset($dias)@if($dias==30)selected @endif @endisset>30
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="meses" id="meses">
                                        <option selected disabled value="null">Meses</option>
                                        <option value="0">0</option>
                                        <option value="1" @isset($meses)@if($meses==1)selected @endif @endisset>1
                                        </option>
                                        <option value="2" @isset($meses)@if($meses==2)selected @endif @endisset>2
                                        </option>
                                        <option value="3" @isset($meses)@if($meses==3)selected @endif @endisset>3
                                        </option>
                                        <option value="4" @isset($meses)@if($meses==4)selected @endif @endisset>4
                                        </option>
                                        <option value="5" @isset($meses)@if($meses==5)selected @endif @endisset>5
                                        </option>
                                        <option value="6" @isset($meses)@if($meses==6)selected @endif @endisset>6
                                        </option>
                                        <option value="7" @isset($meses)@if($meses==7)selected @endif @endisset>7
                                        </option>
                                        <option value="8" @isset($meses)@if($meses==8)selected @endif @endisset>8
                                        </option>
                                        <option value="9" @isset($meses)@if($meses==9)selected @endif @endisset>9
                                        </option>
                                        <option value="10" @isset($meses)@if($meses==10)selected @endif @endisset>10
                                        </option>
                                        <option value="11" @isset($meses)@if($meses==11)selected @endif @endisset>11
                                        </option>
                                        <option value="12" @isset($meses)@if($meses==12)selected @endif @endisset>12
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="anos" id="anos">
                                        <option selected disabled value="null">Anos</option>
                                        <option value="0">0</option>
                                        <option value="1" @isset($anos)@if($anos==1)selected @endif @endisset>1</option>
                                        <option value="2" @isset($anos)@if($anos==2)selected @endif @endisset>2</option>
                                        <option value="3" @isset($anos)@if($anos==3)selected @endif @endisset>3</option>
                                        <option value="4" @isset($anos)@if($anos==4)selected @endif @endisset>4</option>
                                        <option value="5" @isset($anos)@if($anos==5)selected @endif @endisset>5</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--2-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
                            name="raca" id="raca">
                        <option selected disabled value="null">Raça do lote</option>
                        <option value="Embrapa 051"
                                @isset($dados) @if($dados->raca == "Embrapa 051") selected @endif @endisset>Embrapa 051
                        </option>
                        <option value="Gigante Negra De Jersey"
                                @isset($dados) @if($dados->raca == "Gigante Negra De Jersey") selected @endif @endisset>
                            Gigante
                            Negra De Jersey
                        </option>
                        <option value="Rhode Island Red"
                                @isset($dados) @if($dados->raca == "Rhode Island Red") selected @endif @endisset>Rhode
                            Island
                            Red
                        </option>
                        <option value="Plymouth Rock Barrada"
                                @isset($dados) @if($dados->raca == "Plymouth Rock Barrada") selected @endif @endisset>
                            Plymouth
                            Rock Barrada
                        </option>
                        <option value="Caipira De Pescoço Pelado"
                                @isset($dados) @if($dados->raca == "Caipira De Pescoço Pelado") selected @endif @endisset>
                            Caipira De
                            Pescoço Pelado
                        </option>
                        <option value="Orpington"
                                @isset($dados) @if($dados->raca == "Orpington") selected @endif @endisset>Orpington
                        </option>
                        <option value="Caipira Comum"
                                @isset($dados) @if($dados->raca == "Caipira Comum") selected @endif @endisset>Caipira
                            Comum
                        </option>
                        <option value="Shamo"
                                @isset($dados) @if($dados->raca == "Shamo") selected @endif @endisset>Shamo
                        </option>
                        <option value="Embrapa 041"
                                @isset($dados) @if($dados->raca == "Embrapa 041") selected @endif @endisset>Embrapa 041
                        </option>
                        <option value="Garnizés"
                                @isset($dados) @if($dados->raca == "Garnizés") selected @endif @endisset>Garnizés
                        </option>
                        <option value="Índio Gigante"
                                @isset($dados) @if($dados->raca == "Índio Gigante") selected @endif @endisset>Índio
                            Gigante
                        </option>
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
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Anemia Infecciosa", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Anemia Infecciosa</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Bronquite Infecciosa">
                                        <input type="checkbox" name="vacinas[]" value="Bronquite Infecciosa"
                                               id="Bronquite Infecciosa"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Bronquite Infecciosa", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Bronquite Infecciosa</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Coccidiose">
                                        <input type="checkbox" name="vacinas[]" value="Coccidiose"
                                               id="Coccidiose"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Coccidiose", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Coccidiose</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Coriza">
                                        <input type="checkbox" name="vacinas[]" value="Coriza"
                                               id="Coriza"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Coriza", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Coriza</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Gumboro">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Gumboro"
                                               id="Doença de Gumboro"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Doença de Gumboro", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Doença de Gumboro</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Marek">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Marek"
                                               id="Doença de Marek"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Doença de Marek", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Doença de Marek</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Doença de Newcastle">
                                        <input type="checkbox" name="vacinas[]" value="Doença de Newcastle"
                                               id="Doença de Newcastle"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Doença de Newcastle", $vacinas)) checked @endif @endisset>
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
                                               id="Encefalomielite"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Encefalomielite", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Encefalomielite</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Epitelioma (Bouba)">
                                        <input type="checkbox" name="vacinas[]" value="Epitelioma (Bouba)"
                                               id="Epitelioma (Bouba)"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Epitelioma (Bouba)", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Epitelioma (Bouba)</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Pneumovírus">
                                        <input type="checkbox" name="vacinas[]" value="Pneumovírus"
                                               id="Pneumovírus"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Pneumovírus", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Pneumovírus</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Reovírus">
                                        <input type="checkbox" name="vacinas[]" value="Reovírus"
                                               id="Reovírus"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Reovírus", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Reovírus</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Salmonela enteritidis">
                                        <input type="checkbox" name="vacinas[]" value="Salmonela enteritidis"
                                               id="Salmonela enteritidis"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Salmonela enteritidis", $vacinas)) checked @endif @endisset>
                                        <span class="mdl-checkbox__label">Salmonela enteritidis</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="mdl-checkbox mdl-js-checkbox" for="Salmonela gallinarum">
                                        <input type="checkbox" name="vacinas[]" value="Salmonela gallinarum"
                                               id="Salmonela gallinarum"
                                               class="mdl-checkbox__input"
                                               @isset($vacinas)@if(in_array("Salmonela gallinarum", $vacinas)) checked @endif @endisset>
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

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--8-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes"
                                  name="observacoes">@isset($dados){{$dados->observacoes}}@endisset</textarea>
                        <label class="mdl-textfield__label" for="observacoes">Observações</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet"
                            name="id_usuario" id="id_usuario">
                        <option selected disabled value="null">Usuário Responsável</option>
                        @foreach($listaDados as $linha)
                            <option value="{{$linha->id}}">{{$linha->nome}}</option>
                        @endforeach
                    </select>

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