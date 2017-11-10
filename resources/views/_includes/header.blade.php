<div class="mdl-layout__header-row">

    <span class="mdl-layout-title">SGAP</span>

    <div class="mdl-layout-spacer"></div>

    @if(session()->exists("usuario"))
        <nav class="mdl-navigation">

            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{action("ControlaUsuario@index")}}">Início</a>
            </nav>

            <a id="usuario" class="mdl-navigation__link">
                Olá {{explode(" ", session()->get("usuario")->nome)[0]}} !
                <i class="material-icons">keyboard_arrow_down</i>
            </a>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="usuario">
                <a class="mdl-menu__item"
                   href="{{action("ControlaUsuario@edit",['id' => session()->get("usuario")->id])}}">MINHAS
                    INFORMAÇÕES</a>
                <a class="mdl-menu__item" href="{{action("ControlaAutenticacao@loggout")}}">SAIR</a>
            </ul>

        </nav>
    @else
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="{{action("ControlaUsuario@index")}}">Acessar</a>
            <a class="mdl-navigation__link" href="{{action("ControlaUsuario@create")}}">Registrar</a>
        </nav>
    @endif
</div>
