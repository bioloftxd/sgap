<!DOCTYPE html>
<html>
<head>
    @include("includes.head")
</head>

<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <header class="mdl-layout__header">
        @include("includes.header")
    </header>

    @if(session()->exists("usuario"))
        <div class="mdl-layout__drawer">
            @include("layouts.sidebar")
        </div>
    @endif

    <main class="mdl-layout__content">

        @yield("content")

    </main>

    <footer>
        @include("includes.footer")
    </footer>

</div>
</body>
</html>
