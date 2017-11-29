<span class="mdl-layout-title">SGAP</span>
<nav class="mdl-navigation">

    <a id="aviario" class="mdl-navigation__link" href="#">
        AVIÁRIO
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="aviario">
        <a class="mdl-menu__item" href="{{action("ControlaColetaExcremento@index")}}">COLETA DE EXCREMENTO</a>
        <a class="mdl-menu__item" href="{{action("ControlaGaiola@index")}}">GAIOLAS</a>
        <a class="mdl-menu__item" href="{{action("ControlaManutencaoAviario@index")}}">MANUTENÇÃO</a>
        <a class="mdl-menu__item" href="{{action("ControlaVentilacao@index")}}">VENTILAÇÃO</a>
    </ul>

    <a id="aves" class="mdl-navigation__link" href="#">
        AVES
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="aves">
        <a class="mdl-menu__item" href="{{action("ControlaAlimentacao@index")}}">ALIMENTAÇÃO</a>
        <a class="mdl-menu__item" href="{{action("ControlaAquisicao@index")}}">AQUISIÇÃO</a>
        <a class="mdl-menu__item" href="{{action("ControlaMorteAve@index")}}">MORTALIDADE</a>
    </ul>

    <a id="estoque" class="mdl-navigation__link" href="#">
        ESTOQUE
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="estoque">
        <a class="mdl-menu__item" href="{{action("ControlaEstoque@index")}}">ESTOQUE</a>
        <a class="mdl-menu__item" href="{{action("ControlaProduto@index")}}">PRODUTOS</a>
    </ul>

    <a id="ovos" class="mdl-navigation__link" href="#">
        OVOS
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="ovos">
        <a class="mdl-menu__item" href="{{action("ControlaColetaOvo@index")}}">COLETA</a>
        <a class="mdl-menu__item" href="{{action("ControlaEmbalaOvo@index")}}">EMBALAGEM</a>
        <a class="mdl-menu__item" href="{{action("ControlaVendaOvo@index")}}">VENDA</a>
    </ul>

    <a id="fornecimento" class="mdl-navigation__link" href="#">
        FORNECIMENTO
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="fornecimento">
        <a class="mdl-menu__item" href="{{action("ControlaFornecedor@index")}}">FORNECEDOR</a>
        <a class="mdl-menu__item" href="{{action("ControlaFornecimento@index")}}">FORNECIMENTO</a>
    </ul>

    <a id="relatorios" class="mdl-navigation__link" href="#">
        RELATÓRIOS
    </a>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="relatorios">
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioAlimentacao")}}">ALIMENTAÇÃO DAS AVES</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioAquisicao")}}">AQUISIÇÃO DE AVES</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioColetaExcremento")}}">COLETA DE
            EXCREMENTO</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioColetaOvo")}}">COLETA DE OVOS</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioEmbalaOvo")}}">EMBALAGEM DE OVOS</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioEstoque")}}">ESTOQUE</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioFornecedor")}}">FORNECEDOR</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioFornecimento")}}">FORNECIMENTO</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioGaiola")}}">GAIOLAS</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioManutencao")}}">MANUTENÇÃO</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioMortalidade")}}">MORTALIDADE DE AVES</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioProduto")}}">PRODUTOS</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioVendaOvo")}}">VENDA DE OVOS</a>
        <a class="mdl-menu__item" href="{{action("ControlaRelatorios@relatorioVentilacao")}}">VENTILAÇÃO</a>
    </ul>

</nav>