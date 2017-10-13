@extends("_layouts.principal")

@section("title", "Acessar Sistema")

@section("content")

    @php
        $usuario  = (session()->exists("nomeUsuario")) ? session()->get("nomeUsuario") : "";
    @endphp
    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaAutenticacao@store')}}">
                {{csrf_field()}}

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell textoCentralizado">
                        <h4>Acessar Sistema</h4>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="text" id="usuario" name="usuario"
                               value="{{$usuario}}">
                        <label class="mdl-textfield__label" for="usuario">Nome de Usuário</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col-desktop">
                        <input class="mdl-textfield__input" type="password" name="senha" id="senha">
                        <label class="mdl-textfield__label" for="senha">Senha</label>
                    </div>
                    <div class="mdl-layout-spacer"></div>
                </div>

                <div class="mdl-grid">
                    <div class="mdl-layout-spacer"></div>
                    <button type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--4-col-desktop mdl-cell--3-col-phone mdl-cell--5-col-tablet">
                        Entrar
                    </button>
                    <div class="mdl-layout-spacer"></div>
                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop