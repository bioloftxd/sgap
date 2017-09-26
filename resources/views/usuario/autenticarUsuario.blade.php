@extends("layouts/principal")

@section("titulo", "Autenticação")

@section("conteudo")

@if (session("info"))
<p>{{session("info")}}</p>
{{session()->forget("info")}}
@endif

<form action="{{url("usuario/autenticar")}}"method="POST">

    {{csrf_field()}}

    Nome de Usuário:
    <input type="text" name="usuario">

    <br><br>
    Senha:
    <input type="password" name="senha">

    <br><br>
    <input type="submit" value="Entrar">
    <input type="reset" value="Limpar">
</form>

<a href="{{url('usuario/create')}}">Criar novo usuário</a>

@endsection

