@extends("_layouts.principal")

@section("title", "REGISTRAR VENDA DE OVOS")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaVendaOvo@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Registrar Venda de Ovos</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h5>Registrar Venda de Ovos</h5>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="text" autofocus id="nome_comprador"
                               name="nome_comprador"
                               @isset($dados)value="{{$dados->nome_comprador}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="nome_comprador">Nome do Comprador</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_venda" name="data_venda"
                               @isset($dados)value="{{$dados->data_venda}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}"@endempty >
                        <label class=" mdl-textfield__label" for="data_venda">Data da Venda</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="time" id="hora_venda" name="hora_venda"
                               @isset($dados)value="{{$dados->hora_venda}}" @endisset
                               @empty($dados)value="{{date("H:i")}}"@endempty>
                        <label class="mdl-textfield__label" for="hora_venda">Hora da Venda</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade"
                               name="quantidade"
                               @isset($dados)value="{{$dados->quantidade}}" @endisset
                               @empty($dados)value="1"@endempty>
                        <label class="mdl-textfield__label" for="quantidade">Quatidade</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="preco"
                               name="preco"
                               @isset($dados)value="{{$dados->preco}}" @endisset
                               @empty($dados)value="" @endempty step="0.01">
                        <label class="mdl-textfield__label" for="preco">Valor da Venda (R$)</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet"
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

                    <select class="form-control mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-phone mdl-cell--3-col-tablet"
                            name="lote" id="lote">
                        <option selected disabled value="null">Lote</option>
                        @foreach($listaEmbalagens as $linha)
                            <option value="{{$linha->lote}}"
                                    @isset($dados) @if($dados->lote == $linha->lote) selected @endif @endisset>{{$linha->lote}}
                            </option>
                        @endforeach

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
                            <option value="{{$linha->id}}"
                                    @isset($dados)@if($dados->id_usuario == $linha->id)selected @endif @endisset>{{$linha->nome}}</option>
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

                    <a href="{{action("ControlaVendaOvo@index")}}"
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