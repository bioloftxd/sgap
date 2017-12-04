@extends("_layouts.principal")

@section("title", "EDITAR ESTOQUE DE PRODUTOS")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaEstoque@update',["id"=>$dados->id])}}">
                {{method_field("PUT")}}
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Editar Estoque de Produto</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h4>Editar Estoque de Produto</h4>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="text" id="produto" name="produto" disabled
                               @isset($dados)value="{{$dados->produto->nome}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="produto">Produto</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="text" id="tipo_produto" name="tipo_produto" disabled
                               @isset($dados)value="{{$dados->produto->tipo_produto}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="tipo_produto">Tipo Produto</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade" autofocus name="quantidade"
                               @isset($dados)value="{{$dados->quantidade}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="quantidade">Quantidade em Estoque</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="preco" name="preco"
                               @isset($dados)value="{{$dados->preco}}" @endisset
                               @empty($dados)value="" @endempty step="0.01">
                        <label class="mdl-textfield__label" for="preco">Preço do Produto</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col-desktop mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                        <textarea class="mdl-textfield__input" type="text" rows="3" id="observacoes" disabled
                                  name="observacoes">@isset($dados){{$dados->produto->observacoes}}@endisset</textarea>
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

                    <a href="{{action("ControlaEstoque@index")}}"
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