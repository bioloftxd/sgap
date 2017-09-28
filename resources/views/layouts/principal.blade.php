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

    <div class="mdl-layout__drawer">
        @include("layouts.sidebar")
    </div>

    <main class="mdl-layout__content">
        <div class="page-content">
            @yield("content")
        </div>
    </main>

    <footer>
        @include("includes.footer")
    </footer>

</div>
</body>
</html>
