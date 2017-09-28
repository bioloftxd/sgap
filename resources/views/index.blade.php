@extends("layouts.principal")

@section("title", "SGAP - Acessar Sistema")

@section("content")


    <form action="{{action('ControlaUsuario@index')}}" method="POST">
        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="usuario" name="usuario">
                <label class="mdl-textfield__label" for="usuario">Nome de Usuário</label>
            </div>
        </div>

        <div class="row">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="senha" name="senha">
                <label class="mdl-textfield__label" for="senha">Senha</label>
            </div>
        </div>

        <div class="row">
            <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                    data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">send</i>
                Acessar
                <span class="mdl-button__ripple-container"><span
                            class="mdl-ripple is-animating""></span></span>
            </button>
        </div>

        <div class="row">
            <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                    data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">add_circle</i>
                Criar Conta
                <span class="mdl-button__ripple-container"><span
                            class="mdl-ripple is-animating""></span></span>
            </button>
        </div>

    </form>
@stop