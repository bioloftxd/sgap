<!DOCTYPE html>
<html>
    <head>
        @include("includes.head")
    </head>
    
    <body>

        <header>
            @include("includes.header")
        </header>

        <main>
            @yield("conteudo")
        </main>

        <footer>
            @yield("includes.footer")
        </footer>
    </body>
</html>
