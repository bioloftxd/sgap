@extends("_layouts.principal")

@section("title", "EDITAR FORNECIMENTO")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaFornecimento@update',["id"=>$dados->id])}}">
                {{csrf_field()}}
                {{method_field("PUT")}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-cell textoCentralizado mdl-layout--small-screen-only" style="white-space: nowrap">
                        <h5>Editar Fornecimento</h5>
                    </div>
                    <div class="mdl-cell textoCentralizado mdl-layout--large-screen-only">
                        <h4>Editar Fornecimento</h4>
                    </div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet"
                            name="id_produto" id="id_produto">
                        <option selected disabled value="null">Produto</option>
                        @foreach($listaProdutos as $linha)
                            @if($linha->id == $dados->id_produto)
                                <option value="{{$linha->id}}" selected>{{$linha->nome}}</option>
                            @else
                                <option value="{{$linha->id}}">{{$linha->nome}}</option>
                            @endif
                        @endforeach
                    </select>

                    <select class="form-control mdl-cell mdl-cell--3-col-desktop mdl-cell--4-col-phone mdl-cell--4-col-tablet"
                            name="id_fornecedor" id="id_fornecedor">
                        <option selected disabled value="null">Fornecedor</option>
                        @foreach($listaFornecedores as $linha)
                            @if($linha->id == $dados->id_fornecedor)
                                <option value="{{$linha->id}}" selected>{{$linha->nome}}</option>
                            @else
                                <option value="{{$linha->id}}">{{$linha->nome}}</option>
                            @endif
                        @endforeach
                    </select>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="numero_nf" name="numero_nf"
                               @isset($dados)value="{{$dados->numero_nf}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="numero_nf">Número N.F.</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="quantidade" name="quantidade"
                               @isset($dados)value="{{$dados->quantidade}}" @endisset
                               @empty($dados)value=""@endempty >
                        <label class=" mdl-textfield__label" for="quantidade">Quantidade</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_fornecimento" name="data_fornecimento"
                               @isset($dados)value="{{$dados->data_fornecimento}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}" @endempty>
                        <label class=" mdl-textfield__label" for="data_fornecimento">Data Fornecimento</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="lote" name="lote"
                               @isset($dados)value="{{$dados->lote}}" @endisset
                               @empty($dados)value="" @endempty>
                        <label class=" mdl-textfield__label" for="lote">Lote do Fornecimento</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="number" id="preco" name="preco"
                               @isset($dados)value="{{$dados->preco}}" @endisset
                               @empty($dados)value="" @endempty step="0.01">
                        <label class=" mdl-textfield__label" for="preco">Valor do Produto (R$)</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_fabricacao" name="data_fabricacao"
                               @isset($dados)value="{{$dados->data_fabricacao}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}" @endempty>
                        <label class=" mdl-textfield__label" for="data_fabricacao">Data Fabricação</label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--4-col-tablet">
                        <input class="mdl-textfield__input" type="date" id="data_validade" name="data_validade"
                               @isset($dados)value="{{$dados->data_validade}}" @endisset
                               @empty($dados)value="{{date("Y-m-d")}}" @endempty>
                        <label class=" mdl-textfield__label" for="data_validade">Data Validade</label>
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
                        @foreach($listaUsuarios as $linha)
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

                    <a href="{{action("ControlaFornecimento@index")}}"
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