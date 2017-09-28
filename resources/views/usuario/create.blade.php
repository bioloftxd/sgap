@extends("layouts/principal")

@section("titulo", "Usuário")

@section("cabecalho")

@endsection

@section("conteudo")

    @if (session("info"))
        <p>{{session("info")}}</p>
        {{session()->forget("info")}}
    @endif

    <form action="{{action('ControlaUsuario@store')}}" method="POST">

        {{csrf_field()}}

        <input type="text" name="nome" id="nome" placeholder="Nome Completo"><br>
        <input type="text" name="usuario" id="usuario" placeholder="Nome de Usuário"><br>
        <input type="password" name="senha" id="senha" placeholder="Senha de Usuário"><br>
        <input type="password" name="senha_2" id="senha_2" placeholder="Confirme a Senha"><br><br>

        <input type="submit" value="cadastrar">
        <input type="reset" value="Limpar">

    </form>

    <a href="{{url('/')}}">Inicio</a>

@endsection