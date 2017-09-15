<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>

        <link href="css/principal.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/principal.js" type="text/javascript"></script>

    </head>
    <body>

        <header>
            @yield('cabecalho')
        </header>

        <main>
            @yield('conteudo')
        </main>
    </body>
</html>