@extends("layouts.principal")

@section("title", "SGAP - Criar Conta")

@section("content")

    <div class="form-centralizado">
        <form action="{{action('ControlaUsuario@store')}}" method="POST" class="grid">

            <h4 class="textoCentralizado">
                Criar Conta<br>
                SGAP
            </h4>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="text" id="nome" name="nome">
                <label class="mdl-textfield__label" for="usuario">Nome Completo</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="text" id="usuario" name="usuario">
                <label class="mdl-textfield__label" for="usuario">Nome de Usuário</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="password" id="senha" name="senha">
                <label class="mdl-textfield__label" for="usuario">Senha</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputGrande">
                <input class="mdl-textfield__input" type="password" id="confirmaSenha" name="confirmaSenha">
                <label class="mdl-textfield__label" for="senha">Confirme a Senha</label>
            </div>

            <button type="submit"
                    class="botao mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
                    data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">done</i>
                Criar Conta
                <span class="mdl-button__ripple-container">
                    <span class="mdl-ripple is-animating">
                    </span>
                </span>
            </button>
            <a href="action('ControlaUsuario@create')"
               class="botao mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect"
               data-upgraded=",MaterialButton,MaterialRipple">
                <i class="material-icons">reply</i>
                Voltar
                <span class="mdl-button__ripple-container">
                    <span class="mdl-ripple is-animating">
                    </span>
                </span>
            </a>
        </form>
    </div>
@stop