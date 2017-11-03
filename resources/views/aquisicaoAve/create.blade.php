@extends("_layouts.principal")

@section("title", "REGISTRAR AQUISIÇÃO DE AVES")

@section("content")

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaUsuario@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Registrar Aquisição de aves</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="text" id="nomeCompleto" >
                        <label class="mdl-textfield__label" for="nomeCompleto">Nome Completo</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="text" id="nomeUsuario" >
                        <label class=" mdl-textfield__label" for="nomeUsuario">Nome de Usuário</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="password" id="senha">
                        <label class="mdl-textfield__label" for="senha">Senha</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="password" id="senhaConfirma">
                        <label class="mdl-textfield__label" for="senhaConfirma">Confirme a Senha</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--4-col-desktop mdl-cell--3-col-phone mdl-cell--5-col-tablet">
                        Cadastrar
                    </button>
                    <div class="mdl-layout-spacer"></div>
                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop