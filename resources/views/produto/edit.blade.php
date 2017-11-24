@extends("_layouts.principal")

@section("title", "EDITAR PRODUTO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaProduto@update',["id"=>$dados->id])}}">
                {{csrf_field()}}
                {{method_field("PUT")}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Editar Produto</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h4>Editar Produto</h4>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <input class="mdl-textfield__input" type="text" id="nome" autofocus name="nome"
                               @isset($dados)value="{{$dados->nome}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="nome">Nome do Produto</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--1-col-tablet">
                        <input class="mdl-textfield__input" type="text" id="marca" name="marca"
                               @isset($dados)value="{{$dados->marca}}" @endisset
                               @empty($dados)value=""@endempty>
                        <label class="mdl-textfield__label" for="marca">Marca</label>
                    </div>

                    <select class="form-control mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet"
                            name="tipo_produto" id="tipo_produto">
                        <option disabled selected value="null">Tipo de Produto</option>
                        <option value="Embalagem"
                                @isset($dados)@if($dados->tipo_produto == "Embalagem") selected @endif @endisset>
                            Embalagem
                        </option>
                        <option value="Medicamento"
                                @isset($dados)@if($dados->tipo_produto == "Medicamento") selected @endif @endisset>
                            Medicamento
                        </option>
                        <option value="Ração"
                                @isset($dados)@if($dados->tipo_produto == "Ração") selected @endif @endisset>Ração
                        </option>
                        <option value="Vacina"
                                @isset($dados)@if($dados->tipo_produto == "Vacina") selected @endif @endisset>Vacina
                        </option>
                    </select>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet">
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
                        Salvar
                    </button>

                    <div class="mdl-layout-spacer"></div>

                    <a href="{{action("ControlaProduto@index")}}"
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