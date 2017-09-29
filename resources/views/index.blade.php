@extends("layouts.principal")

@section("title", "SGAP - Acessar Sistema")

@section("content")


    <div class="form-centralizado">
        <form action="{{action('ControlaUsuario@index')}}" method="get" class="grid">

            <h4 class="textoCentralizado">
                Acessar Sistema<br>
                SGAP
            </h4>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="text" id="usuario" name="usuario">
                <label class="mdl-textfield__label" for="usuario">Nome de Usuário</label>
            </div>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="password" id="senha" name="senha">
                <label class="mdl-textfield__label" for="senha">Senha</label>
            </div>

            <a href="action('ControlaUsuario@index')"
               class="botao mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
               data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">done</i>
                Entrar
                <span class="mdl-button__ripple-container">
                    <span class="mdl-ripple is-animating">
                    </span>
                </span>
            </a>
            <a href="action('ControlaUsuario@create')"
               class="botao mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
               data-upgraded=",MaterialButton,MaterialRipple">


                <i class="material-icons">add_circle_outline</i>
                Criar Conta
                <span class="mdl-button__ripple-container">
                    <span class="mdl-ripple is-animating">
                    </span>
                </span>
            </a>
        </form>
    </div>
@stop