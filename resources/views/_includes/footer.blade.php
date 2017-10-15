@if(session()->exists("info"))
    <div id="informacoes" class="mdl-js-snackbar mdl-snackbar">

        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>

    </div>

    <script>
        (function () {

            var info = document.querySelector('#informacoes');
            window.addEventListener('load', function () {
                var data = {message: '{{session()->get("info")}}'};
                info.MaterialSnackbar.showSnackbar(data);
            });
        }());
    </script>

    {{session()->forget("info")}}

@endif

