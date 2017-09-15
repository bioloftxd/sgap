@extends("layouts/principal")

@section("titulo", "Autenticação")

@section("conteudo")

<form action="/autenticar" method="POST">

    {{csrf_field()}}

    Nome de Usuário:
    <input type="text" name="nomeUsuario">

    <br><br>
    Senha:
    <input type="password" name="senhaUsuario">

    <br><br>
    <input type="submit" value="Entrar">
    <input type="reset" value="Limpar">
</form>

<a href="/cadastrar">Criar novo usuário</a>

@endsection

