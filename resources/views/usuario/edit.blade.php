@extends("_layouts.principal")

@section("title", "INFORMAÇÕES DO USUÁRIO")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaUsuario@update',["id" => $usuario->id])}}">
                {{csrf_field()}}
                {{ method_field('PUT') }}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Dados Usuário</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop">
                        <input class="mdl-textfield__input" type="text" id="nomeCompleto" autofocus value="{{$usuario->nome}}"
                               name="nome">
                        <label class="mdl-textfield__label" for="nomeCompleto">Nome Completo</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col-desktop">
                        <input class="mdl-textfield__input" type="text" id="nomeUsuario" value="{{$usuario->usuario}}"
                               name="usuario">
                        <label class=" mdl-textfield__label" for="nomeUsuario">Nome de Usuário</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col-desktop">
                        <input class="mdl-textfield__input" type="password" id="senha" name="senha">
                        <label class="mdl-textfield__label" for="senha">Senha Atual</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop">
                        <input class="mdl-textfield__input" type="password" id="novaSenha" name="novaSenha" value="">
                        <label class="mdl-textfield__label" for="novaSenha">Nova Senha</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col-desktop">
                        <input class="mdl-textfield__input" type="password" id="novaSenhaConfirma"
                               name="novaSenhaConfirma" value="">
                        <label class="mdl-textfield__label" for="novaSenhaConfirma">Confirme Nova Senha</label>
                    </div>

                    <div class="mdl-layout-spacer"></div>

                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>

                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--3-col-phone mdl-cell--5-col-tablet">
                        Salvar
                    </button>
                    <div class="mdl-layout-spacer"></div>
                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop