@extends("_layouts.principal")

@section("title", "RELATÓRIO DE ALIMENTAÇÃO DAS AVES")

@section("content")

    <link rel="stylesheet" href="/css/select.css"/>

    <div class="mdl-grid">

        <div class="mdl-layout-spacer"></div>

        <div class="mdl-cell mdl-cell--11-col">

            <form method="POST" action="{{action('ControlaRelatorios@alimentacao')}}">
                {{csrf_field()}}

                <div class="mdl-grid">

                    <div class="mdl-layout-spacer"></div>

                    <select class="form-control mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                            name="data_inicial" id="data_inicial">
                        <option selected disabled value="null">Data Inicial</option>
                        @foreach($listaDados as $linha)
                            @php
                                $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                $data = date_format($data, 'd/m/Y');
                            @endphp
                            <option value="{{$linha->data}}">{{$data}}</option>
                        @endforeach
                    </select>

                    <select class="form-control mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-phone mdl-cell--3-col-tablet"
                            name="data_final" id="data_final">
                        <option selected disabled value="null">Data Final</option>
                        @foreach($listaDados as $linha)
                            @php
                                $data = DateTime::createFromFormat('Y-m-d', $linha->data);
                                $data = date_format($data, 'd/m/Y');
                            @endphp
                            <option value="{{$linha->data}}">{{$data}}</option>
                        @endforeach
                    </select>

                    <div class="mdl-layout-spacer"></div>

                </div>

            </form>

        </div>

        <div class="mdl-layout-spacer"></div>

    </div>

@stop